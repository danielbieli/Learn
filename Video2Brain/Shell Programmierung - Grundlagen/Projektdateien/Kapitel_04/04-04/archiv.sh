#!/bin/bash

if [ -n "$1" ]
then 
	echo "Verzeichnis angeben"
	exit 1
fi

echo "Archiviere das Verzeichnis ${1}"
tar cvfz "${1}.tgz" "${1}"
