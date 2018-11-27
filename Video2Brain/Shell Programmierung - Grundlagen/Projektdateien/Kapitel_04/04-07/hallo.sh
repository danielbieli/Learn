#!/bin/bash

vorname="Tim"
nachname="Schürmann"
benutzername="tim123"

if [ \( "$vorname" = "Tim" -a "$nachname" = "Schürmann" \) -o "$benutzername" = "tim123" ]
then
	echo "Willkommen!"
fi

