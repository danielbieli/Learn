#!/bin/bash

zahl=0
while [ $zahl -lt 10 ]
do
	zahl=`expr $zahl + 1`
	if [ "$zahl" -ne 5 ]
	then
		continue
	fi
	echo "$zahl"
done

echo "Fertig!"

