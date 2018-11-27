#!/bin/bash

printf "Der Rechner heißt %s und besitzt die IP-Adresse %s\n" `hostname` `hostname -I`

>&2 echo "System läuft seit:"
uptime 2>> fehler.txt

