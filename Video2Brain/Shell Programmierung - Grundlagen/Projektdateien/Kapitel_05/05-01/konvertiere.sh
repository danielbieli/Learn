#!/bin/bash

dateien="bild1.jpg bild2.jpg"

for datei in $dateien
do
	echo "Konvertiere $datei"
	convert "$datei" "${datei%.jpg}.png"
done

