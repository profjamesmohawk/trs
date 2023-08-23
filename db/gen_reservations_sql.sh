#!/bin/bash
#
# shell scipt to generate SQL to populate reservations in TRS
#
# ./gen_reservations_sql.sh > add_reservations.sql

LINE=0

echo "USE trs;"
echo "INSERT INTO reservations( host_id,start_time,length_min) VALUES"

for ID in 1 2 # james wayne
do
		for DAY in \
				2023-09-22 \
				2023-09-29
		do
			for TIME in \
				10:00:00 \
				10:15:00 \
				10:30:00 \
				10:45:00 \
				11:00:00 \
				11:15:00 \
				11:30:00 \
				11:45:00 
			do	
				if [ $LINE -gt 0 ]
				then
					echo -n ","
				fi
				(( LINE++ ))
				# 1 james
				# 2 wayne
				echo  "($ID, { t '$DAY $TIME'},15)"
			done # TIME
		done # DAY
done # ID
echo ";"

