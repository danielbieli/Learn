#!/bin/bash

zeit=`date +%s`
sleep 2
aktuell=`date +%s`
dauer=`expr $aktuell - $zeit`
echo $dauer
