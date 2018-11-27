#!/bin/bash

zahl=5

if [ "$#" -eq "0" ]
then
	echo "Bitte eine Datei als Parameter übergeben."
	exit 1
fi

if test -f "$1"
then
	echo "Die Datei $1 existiert!"
	exit 0
fi
echo "Die Datei $1 gibt es nicht!"

