<?php
	ini_set('display_errors', 1);
	$hostname = "dbhost.cs.man.ac.uk";
	$mysqlusername = "n33565af";
	$mysqlpassword = "databasepass";
	$dbName = "n33565af";
	
//this script compares the user input to associated login info in the User entity and then if it is correct will allow the user to login 	
	//declaring vars being passed from client
	$Email = $_POST["EmailPost"];
	$Password = $_POST["PasswordPost"];
	
	
	//make connection
	$connection = new mysqli($hostname, $mysqlusername, $mysqlpassword, $dbName);
	if(!$connection)
	{
		die("Connection failed. ". mysqli_connect_error());
	}
	
	//query to select the password of the username entered
	//preparing parameters to prevent sql injection
	$query = mysqli_prepare($connection, "SELECT Password FROM USERS WHERE Email = ?;");
	//binding parameters
	$insert = mysqli_stmt_bind_param($query, "s", $Email);
	
	//executes query
	mysqli_stmt_execute($query);
	//binds results 
	mysqli_stmt_bind_result($query, $result);
	//stores results in var
	$row = mysqli_stmt_fetch($query);
	//closes statement
	mysqli_stmt_close($query);			
		
	//checks to see if the password entered is the same as the original password
	if($password == $row)
	{
		echo "login successful";
	}	
	else 
	{
		echo "Password incorrect, try again";
	}		
	}
?>