<?php
	#
	# set the database connection parameters
	#

	# my_getenv() adds a default value to getenv()
	#
	function my_envget($EnvVarName, $DefaultValue)
	{
		$EnvVarValue=getenv($EnvVarName);
		if ( ! $EnvVarValue ) {
			return $DefaultValue;
		}
		return $EnvVarValue;
	}

	# set the config file name
	$ConfigFileName="/var/local/xtrs/config.php";

	# Get the config values from $ConfigFileName, if we can
	#
	if ( file_exists($ConfigFileName) ){
		include	$ConfigFileName;
 	}
	else {
		# config file not found, use the default values
		# Environment variables take precedence
		# 
		$trs_db_uid=my_envget("TRS_DB_UID","trs_user");
		$trs_db_pw=my_envget("TRS_DB_PW", "trs_pass");
		$trs_db_host=my_envget("TRS_DB_HOST","db");
		$trs_db_db=my_envget("TRS_DB_DB","trs");
	}
?>
