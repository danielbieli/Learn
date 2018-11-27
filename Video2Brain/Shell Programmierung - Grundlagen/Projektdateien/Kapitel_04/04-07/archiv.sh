#!/bin/bash

if [ ! -d "$1" ]
then
	echo "Bitte ein Verzeichnis angeben!"
	exit 1
fi

tar cvfz "${1}.tgz" "${1}"
exit 0

