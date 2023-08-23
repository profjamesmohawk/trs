<?php
	#
	# set the database connection parameters
	#

	# set the config file name
	$ConfigFileName="/var/local/xtrs/config.php";

	# Get the config values from $ConfigFileName, if we can
	#
	if ( file_exists($ConfigFileName) ){
		include	$ConfigFileName;
 	}
	else {
		# config file not found, use the default values
		# 
		$trs_db_uid="trs_user";
		$trs_db_pw="trs_pass";
		$trs_db_host="db";
		$trs_db_db="trs";
	}
?>
