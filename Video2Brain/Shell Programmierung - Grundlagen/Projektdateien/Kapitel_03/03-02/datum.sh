#!/bin/bash

datum="unbekannt"
datum=`date +%Y%m%d-%H%M`
tar cvfz Bilder-${datum}.tar.gz Bilder/
echo 'Die Variable $datum enthält das Datum.'

