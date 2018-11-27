#!/bin/sh

picnum=1

for file in *.JPG
do
	[ -e "$file" ] || continue
	mv "$file" "urlaub_$picnum".jpg;
	#picnum=$(($picnum+1))
	picnum=`expr $picnum + 1`
done
exit

