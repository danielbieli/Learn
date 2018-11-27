#!/bin/bash

if [[ -f "$1" ]] && [[ -r "$1" ]]
then
	echo "Konvertiere"
	convert "$1" "${1%.jpg}.png"
else
	echo "Bitte eine Datei angeben!"
fi

