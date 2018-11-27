#!/bin/bash

if convert bild2.jpg bild1.png 2> /dev/null
then
	echo "Erfolgreich!"
else
	echo "Fehler!"
fi


