<?php
	ini_set('display_errors', 1);
	$hostname = "dbhost.cs.man.ac.uk";
	$mysqlusername = "n33565af";
	$mysqlpassword = "databasepass";
	$dbName = "n33565af";
	
	//script should query for outfits to be displayed? ask team about what exactly it should do, display outfits, username
	//loads profile pic
	//make connection
	$connection = new mysqli($hostname, $mysqlusername, $password, $dbName);
	
	if(!$connection)
	{
		die("Connection failed. ". mysqli_connect_error());
	}		
	
?>