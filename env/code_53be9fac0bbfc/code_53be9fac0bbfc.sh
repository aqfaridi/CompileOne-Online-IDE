#!/bin/bash
while true
do
	read line
    line1=${line/.*}
	if       [  $line1 -eq 42 ]
	then 
		exit 0
	fi
	echo $line1
done