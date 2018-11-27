#!/bin/bash

benutzer=`whoami`

if [ "$benutzer" = "tim" ]
then
	echo "Hallo Tim."
elif [ "$benutzer" = "max" ]
then
	echo "Hallo Max."
else
	echo "Keinen Benutzer erkannt."
fi

