<?php

//this script will take user inputs and store in the user entity creating a new user for the website
	//database connection information
	ini_set('display_errors', 1);
	$hostname = "dbhost.cs.man.ac.uk";
	$mysqlusername = "n33565af";
	$mysqlpassword = "databasepass";
	$dbName = "n33565af";
	
	//make connection
	$connection = new mysqli($hostname, $mysqlusername, $mysqlpassword, $dbName);
	if(!$connection)
	{
		die("Connection failed. ". mysqli_connect_error());
	}
	else
	{
		//declaring vars being passed from client
		$Username = $_POST["UsernamePost"];
		$Password = $_POST["PasswordPost"];
		$PasswordCheck = $_POST["PasswordCheckPost"];
		$Email = $_POST["EmailPost"];
		
		
		//Checks that the password entered was correct
		if($Password != $PasswordCheck)
		{
			//query to insert username and password to database		
			//preparing parameters to help prevent sql injection
			$query = mysqli_prepare($connection,"INSERT INTO USERS(Username, Password, Email)
												VALUES (?,?,?);"
		
			//binding parameters
			$insert = mysqli_stmt_bind_param($query, "sss", $Username, $Password, $Email);
			
			//query executed and closed
			$result = mysqli_stmt_execute($query);
			mysqli_stmt_close($query);	
			//check to see if username us duplicate	
			if(!$result)
			{
				echo "Username already exists";
			}else
			{
				echo "Login created";
			}	
		}else
		{
			echo "Password was entered incorrectly";
		}	
	}
?>