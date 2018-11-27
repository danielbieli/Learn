#!/bin/bash

if grep "Dortmund" adressen.txt | wc -l
then
	echo "Es gibt jemanden in Dortmund."
else
	echo "Niemand wohnt in Dortmund."
fi


