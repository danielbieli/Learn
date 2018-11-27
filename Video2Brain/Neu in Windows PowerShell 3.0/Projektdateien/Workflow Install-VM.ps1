# Workflow that installs VMs on a Hyper-V capable host
workflow Install-VM
{
    param
    (
        # Full path to base Vhd for VMs
        [Parameter(Mandatory=$true)]
        [String]$BaseVhdPath,
        # Prefix for VM names
        [String]$VMNamePrefix = "Demo",
        # Number of VMs to create
        [Int]$VMCount = 3,
        # Domain credential required to join the VMs to a domain
        [Parameter(Mandatory=$true)]
        [System.Management.Automation.PSCredential] $domainCred,	    
        # Local credential required to connect to VMs before being joined to domain
        [Parameter(Mandatory=$true)]
        [System.Management.Automation.PSCredential] $localCred
    )

    # Create VMs in parallel
    foreach -parallel($i in 1..$VMCount)
    {        
        # Create the VM name
        [string]$VMName = $VMNamePrefix+$i

        # Full path for the differencing VHDs
        [string]$VhdPath = (Split-Path $BaseVhdPath) + "\" + $VMName +".vhd"
        
        # Create differencing VHDs
        # NOTE: (Known bug) Ideally, following syntax should be:
        # $DiffVHD = New-VHD -ParentPath $BaseVhdPath -Path $VhdPath
        $DiffVHD = New-VHD -ParentPath $using:BaseVhdPath -Path $using:VhdPath
        
        # Create New VM with the differencing VHD etc
        # NOTE: (Known bug) Ideally, following syntax should be:
        # $null = New-VM -MemoryStartupBytes 1GB -Name $VMName `
        #                -VHDPath $DiffVHD.Path -SwitchName "InternalSwitch"
        $null = New-VM -MemoryStartupBytes 1GB -Name $using:VMName `
                       -VHDPath ($using:DiffVHD).Path -SwitchName "InternalSwitch"
    }

    # Save the workflow state and data
    Checkpoint-Workflow

    # Start VMs in parallel and collect their IP addresses
    $IPAddresses = foreach -parallel($i in 1..$VMCount)
    {        
        # Create the VM name
        [string]$VMName = $VMNamePrefix+$i

        # Start the VM
        Start-VM -Name $VMName

        # Wait for IP Address to be assigned to each VM.
        # Use Inlinescript to check for VMs IP address
        $VMIP = Inlinescript
                {
                    (Get-VM -Name $using:VMName).NetWorkAdapters.IPAddresses
                } -DisplayName "Get-VMIPAddress"

        while($VMIP.count -lt 2) 
        {
            # Use Inlinescript to check for VMs IP address
            $VMIP = Inlinescript
                    {
                        (Get-VM -Name $using:VMName).NetWorkAdapters.IPAddresses
                    } -DisplayName "Get-VMIPAddress"

            # Notify user via progress stream
            Write-Progress -Id $i -Activity "Get-VMIPAddress on $VMName" `
                           -Status "Waiting for IP Address ..."

            # Wait for 5 seconds and retry
            Start-Sleep -Seconds 5;
        }
        $VMIP[0]
    }

    # Show the IPs collected to workflow user
    $IPAddresses

    # Before suspending the workflow (say for checking some settings, freeing up resources), 
    # send mail to senior admin notifying the suspended state of workflow
    Send-MailMessage -From "juniorAdmin@contoso.com" -To "seniorAdmin@contoso.com" `
                     -SMTPServer "your SMTP sever" -PSComputerName "" `
                     -Subject "Suspended workflow $jobCommandName requires attention" `
                     -Body `
                     @"
        A workflow running on $hostname with name $jobCommandName requires your attention.
        Please use Resume-Job cmdlet to resume the workflow execution
"@

    # Suspend this workflow execution
    Suspend-Workflow

    # Call the Join-Domain workflow to join the VMs to the domain
    Join-Domain -PSComputerName $IPAddresses -PSCredential $localCred -domainCred $domainCred

    # Send mail to senior admin notifying the completion of workflow
    Send-MailMessage -From "juniorAdmin@contoso.com" -To "seniorAdmin@contoso.com" `
                     -SMTPServer "your SMTP sever" -PSComputerName "" `
                     -Subject "Workflow $parentjobname with InstanceID:$parenetjobinstanceid has completed" `
                     -Body `                     `
                     @"
        A workflow running on $hostname with name $jobCommandName completed successfully.
        Please use Receive-Job cmdlet to see the output of workflow execution
"@
}

# Workflow that will join a machine to a domain 
workflow Join-Domain
{
    param(
	    [string] $domainName="corp.net",
        [Parameter(Mandatory=$true)]
        [System.Management.Automation.PSCredential] $domainCred
    )

    # Check that the machine is joined to WORKGROUP
    Get-CimInstance -ClassName CIM_ComputerSystem

    # Add the machine to domain and restart
    Add-Computer -DomainName $domainName -LocalCredential $PSCredential -Credential $domainCred
    Restart-Computer -Wait -For WinRM -Force -Protocol WSMan

    # Notice that now it is joined to domain!
    Get-CimInstance -ClassName CIM_ComputerSystem
} 