#!/bin/bash

zahl=10
until [ $zahl -eq 0 ]
do
	echo "$zahl"
	sleep 1
	zahl=`expr $zahl - 1`
done

