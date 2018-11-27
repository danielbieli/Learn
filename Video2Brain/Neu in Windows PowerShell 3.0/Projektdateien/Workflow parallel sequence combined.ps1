# Workflow parallel sequence combined

Workflow Test-Workflow {
    "Das wird zuerst ausgeführt"

    parallel {
        "Befehl Par1"
        "Befehl Par2"
        "Befehl Par3"

        sequence {
            "Befehl SeqA"
            "Befehl SeqB"
        }
    }
}

Test-Workflow