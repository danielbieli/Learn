#!/bin/bash

printf "Der Rechner heißt %s und besitzt die IP-Adresse %s\n" `hostname` `hostname -I`

uptime > /dev/null
