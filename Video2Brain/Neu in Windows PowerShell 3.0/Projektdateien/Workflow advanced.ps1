# snippet Workflow advanced
workflow Verb-Noun
{
<#
.Synopsis
   Kurzbeschreibung
.DESCRIPTION
   Lange Beschreibung
.EXAMPLE
   Beispiel für die Verwendung dieses Workflows
.EXAMPLE
   Ein weiteres Beispiel für die Verwendung dieses Workflows
.INPUTS
   Eingaben in diesen Workflow (falls vorhanden)
.OUTPUTS
   Ausgabe dieses Workflows (falls vorhanden)
.NOTES
   Allgemeine Hinweise
.FUNCTIONALITY
   Die Funktionalität, die diesen Workflow am besten beschreibt
#>

    [CmdletBinding(DefaultParameterSetName='Parameter Set 1',
                  HelpUri = 'http://www.microsoft.com/',
                  ConfirmImpact='Medium')]
    [OutputType([String])]
    Param
    (
        # Hilfebeschreibung zu Param1
        [Parameter(Mandatory=$true, 
                   Position=0,
                   ParameterSetName='Parameter Set 1')]
        [ValidateNotNull()]
        [Alias("p1")] 
        $Param1,

        # Hilfebeschreibung zu Param2
        [int]
        $Param2
    )

    # Speichert den aktuellen Workflowstatus und die Ausgabe (behält die Angaben bei)
    # Checkpoint-Workflow

    # Hält den Workflow an
    # Suspend-Workflow 

    # Allgemeine Workflowparameter stehen als Variablen zur Verfügung, z. B.:
    $PSPersist 
    $PSComputerName
    $PSCredential
    $PSUseSsl
    $PSAuthentication

    # Auf die Workflowlaufzeitinformationen kann über die folgenden Variablen zugegriffen werden:
    $Input
    $PSSenderInfo
    $PSWorkflowRoot
    $JobCommandName
    $ParentCommandName
    $JobId
    $ParentJobId
    $WorkflowInstanceId
    $JobInstanceId
    $ParentJobInstanceId
    $JobName
    $ParentJobName

    # Die Statusmeldung "ParentActivityId" festlegen
    $PSParentActivityId

    # Einstellungsvariablen, die das Laufzeitverhalten steuern
    $PSRunInProcessPreference
    $PSPersistPreference
}