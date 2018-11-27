#!/bin/bash

echo "Archiviere das Verzeichnis ${1}"
tar cvfz "${1}.tgz" "${1}"


