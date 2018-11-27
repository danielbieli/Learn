#!/bin/bash

benutzer=`whoami`

case "$benutzer" in
	tim) echo "Hallo"
		echo "Tim.";;
	max) echo "Hallo Max.";;
	*) echo "Keinen Benutzer erkannt.";;
esac

