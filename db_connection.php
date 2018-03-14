<?php 

#error
$err = array();

### get db config -> DB(array)
defined("DB")? null : define("DB", parse_ini_file("config.ini"));

###connect to the database
$db_connection = mysqli_connect(DB["HOST"], DB["USER"], DB["PASS"], DB["NAME"]);

#if connection failed
if( !$db_connection ){

	$err["connection_lost"] = mysqli_connect_error();
	$err["connection_lost_errNo"] = mysqli_connect_errno();
}else{
###if success
	#echo "successfully connected to the database";
}

#show errors
if( !empty($err) ) print_r($err);


?>