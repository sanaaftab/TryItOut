<?php
	ini_set('display_errors', 1);
	$hostname = "dbhost.cs.man.ac.uk";
	$mysqlusername = "n33565af";
	$mysqlpassword = "databasepass";
	$dbName = "n33565af";
	
	//saves selected clothes as a favourit in user_clothes
	
	$Username = $_POST["UsernamePost"];	
	$ItemName = $_POST["ItemNamePost"];
	
	//make connection
	$connection = new mysqli($hostname, $mysqlusername, $mysqlpassword, $dbName);
	if(!$connection)
	{
		die("Connection failed. ". mysqli_connect_error());
	}
	
	$Query = "UPDATE USER_CLOTHES
			SET IsFavourite = 1
			WHERE 
	
?>