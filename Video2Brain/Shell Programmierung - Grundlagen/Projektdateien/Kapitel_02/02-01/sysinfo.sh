#!/bin/bash

# Script         : Gibt Informationen über das System aus
# Autor          : Tim Schürmann
# E-Mail         : info@tim-schuermann.de
# Version        : 1.0
# Letzte Änderung: 30.10.2015
# Ablauf         : Ruft hostname, who und uptime auf.

echo -n "Hostname: "
hostname # gibt den Hostnamen aus
echo
echo "Die angemeldeten Benutzer:"
who
echo -e "\nStartzeit des Systems: \c"
uptime -s

