<?php
	########################################################################
	#
	# Set the database connection parameters
	#	trs_db_uid	- mariadb user name 
	#	trs_db_pw	- mariadb pw to use for trs_db_uid
	#	trs_db_host	- hostname or IP address of DB server
	#	trs_db_db	- mariadb database name
	#
	# To support multiple deployment strategies we can set the configuraion
	# variables in three places.  They are evaluated in the following order
	# with later assignments overwriting previous ones.
	#	- this file
	#	- $ConfigFileName
	#	- environment variables:
	#			(TRS_DB_UID, TRS_DB_PW, TRS_DB_HOST, TRS_DB_DB)
	#
	# James, October 2023
	########################################################################

	# set the defaults
	$trs_db_uid="trs_user";
	$trs_db_pw= "trs_pass";
	$trs_db_host="db";
	$trs_db_db="trs";

	# set the config file name, to override assignments made above
	# place outside document root to increase security
	$ConfigFileName="/var/local/xtrs/config.php";


	############### no configuration changes after this line ###############


	# Get the config values from $ConfigFileName, 
	#
	if ( file_exists($ConfigFileName) ){
		include	$ConfigFileName;
 	};

	# function my_getenv() adds a default value to getenv()
	#
	function my_envget($EnvVarName, $DefaultValue)
	{
		$EnvVarValue=getenv($EnvVarName);
		if ( ! $EnvVarValue ) {
			return $DefaultValue;
		}
		return $EnvVarValue;
	}

	# overwrite values with those from envvariables where present
	$trs_db_uid=my_envget("TRS_DB_UID",$trs_db_uid);
	$trs_db_pw=my_envget("TRS_DB_PW", $trs_db_pw);
	$trs_db_host=my_envget("TRS_DB_HOST",$trs_db_host);
	$trs_db_db=my_envget("TRS_DB_DB",$trs_db_db);
?>
