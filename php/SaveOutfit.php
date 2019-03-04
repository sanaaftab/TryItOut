<?php
	ini_set('display_errors', 1);
	$hostname = "dbhost.cs.man.ac.uk";
	$mysqlusername = "n33565af";
	$mysqlpassword = "databasepass";
	$dbName = "n33565af";
	
	//displays Recent outfit, favourite items(create new attribute),
	//make connection
	$connection = new mysqli($hostname, $mysqlusername, $password, $dbName);
	
	if(!$connection)
	{
		die("Connection failed. ". mysqli_connect_error());
	}		
?>