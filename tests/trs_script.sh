#!/bin/bash
#
#	Use curl to generate load on the trs site
#
# 	If -l is specified, script will loop indefinately
#

TRS_HOST=20.85.158.209

{
while true
do
	
		# get login page
		curl --cookie-jar myjar -b myjar http://${TRS_HOST}/trs.php 

		# login
		curl --cookie-jar myjar -b myjar \
			-d "name=alice&passwd=pw"	\
			http://${TRS_HOST}/trs.php 

		# make a reservation
		curl --cookie-jar myjar -b myjar \
			"http://${TRS_HOST}/deladd.php?action=add&res_id=14" 

		# make a reservation
		curl --cookie-jar myjar -b myjar \
			"http://${TRS_HOST}/deladd.php?action=del&res_id=14"

		# log off
		curl --cookie-jar myjar -b myjar \
			http://${TRS_HOST}/logout.php 

		if [ "_$1" != "_-l" ]
		then
			break
		fi
done
} > /dev/null
