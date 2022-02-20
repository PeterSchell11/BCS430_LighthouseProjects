<?php

// Variables
	$mysql_host			= 'localhost';
	$mysql_userid		= 'root';
	$mysql_password		= NULL;
	$mysql_database		= 'bcs350';
	
// Connect to the MySQL and the Phone Book Database
	$mysqli = mysqli_connect($mysql_host, $mysql_userid, $mysql_password, $mysql_database);
	if (!$mysqli) echo "MySQL Connection Failure: " . mysqli_connect_error();
?>