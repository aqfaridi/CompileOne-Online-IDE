#!/bin/bash
while true
do
	read line
	if       [  $line = 42 ]
	then 
		exit 0
	fi
	echo $line
done