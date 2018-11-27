#!/bin/bash

rechner=`hostname`

if [ "$rechner" != "bob" ]
then
	echo "Laufe nicht auf bob"
fi

