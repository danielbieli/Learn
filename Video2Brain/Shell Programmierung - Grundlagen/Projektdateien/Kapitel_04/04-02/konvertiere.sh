#!/bin/bash

if convert bild2.jpg bild1.png
then
	echo "Erfolgreich"
else
	echo "Fehler!"
	exit 1
fi

echo "Ende"
