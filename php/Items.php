<?php
	ini_set('display_errors', 1);
	$hostname = "dbhost.cs.man.ac.uk";
	$mysqlusername = "n33565af";
	$mysqlpassword = "databasepass";
	$dbName = "n33565af";
	
	//this script will return the directory address of the clothes with name of the clothes and store
	
	//make connection
	$connection = new mysqli($hostname, $mysqlusername, $password, $dbName);
	
	if(!$connection)
	{
		die("Connection failed. ". mysqli_connect_error());
	}		

	//SQL query to return all links in descending order
	$sqlquery = "SELECT StorageLink, Name
				FROM CLOTHES			
				ORDER BY ClothesID DESC;"
				
	$result = mysqli_query($connection,$sqlquery)or die(mysqli_error($connection));
	
	if(mysqli_num_rows($result) > 0)
	{
		//show data in each row 
		while($row = mysqli_fetch_assoc($result))
		{
			echo $row['StorageLink']." | ".$row['Name']. "x";
		}	
	}
?>