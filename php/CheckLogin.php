<?php
	//database connection information
	$hostname = "localhost";
	$mysqlusername = "id4104479_leaderboardlogin";
	$mysqlpassword = "abcde";
	$dbName = "id4104479_leaderboardlogin";
	
	//declaring vars being passed from client
	$username = $_POST["usernamePost"];
	$password = $_POST["passwordPost"];
	$hash = $_POST['hashPost'];
	$userHash = $_POST['userhashPost'];
	$privateKey = "2kyK2GP3kp";
		
	//compare hash values to test data integrity and if different notify of failure
	$expected_hash = md5($username . $password .  $privateKey);
	if($expected_hash == $hash) 
	{
		//make connection
		$connection = new mysqli($hostname, $mysqlusername, $mysqlpassword, $dbName);
		if(!$connection)
		{
			die("Connection failed. ". mysqli_connect_error());
		}
		
		//query to select the password of the username entered
		//preparing parameters to prevent sql injection
		$query = mysqli_prepare($connection, "SELECT Password FROM Users WHERE UserHashValue = ?;");
		//binding parameters
		$insert = mysqli_stmt_bind_param($query, "s", $userHash);
		
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