<?php

//this script will take user inputs and store in the user entity creating a new user for the website
	//database connection information
	
	ini_set('display_errors', 1);
	$hostname = "dbhost.cs.man.ac.uk";
	$mysqlusername = "n33565af";
	$mysqlpassword = "databasepass";
	$dbName = "2018_comp10120_w1";
	
	//declaring vars being passed from client
	$Username = $_POST["UsernamePost"];
	$Email = $_POST["EmailPost"];
	$Password = $_POST["PasswordPost"];
	$PasswordCheck = $_POST["PasswordCheckPost"];
	
	if ($Username === "" || $Email === "" || $Password === "" || $PasswordCheck === "")
    backToLogin('None of the fields can be left blank!');
  else if (filter_var($Email, FILTER_VALIDATE_EMAIL) === false)
	  backToLogin('Please enter a valid email.');
	
	//make connection
	$connection = new mysqli($hostname, $mysqlusername, $mysqlpassword, $dbName);
	if($connection->connect_error)
	{
		die("Connection failed. ".  $connection->connect_error);
	}
	
	//Checks that the password entered was correct
	if($Password == $PasswordCheck)
	{
		//query to insert username and password to database		
		//preparing parameters to help prevent sql injection
		$query = $connection->prepare("INSERT INTO USERS(Username, Password, Email)
                										VALUES (?,?,?)");
		if($query == false)
			echo "Could not create new user";
	
		//binding parameters
		$query->bind_param("sss", $Username, $Password, $Email);
				
		//query executed and closed
		if (!$query->execute())
		{
			backToLogin('Execution failed: ('.$query->errno.')'.$query->error);
		}
		else
		  header('Location: explore.html');
		  		
		$query->close();
		
	function backToLogin($message)
	{
	  echo "<script>alert('Fatal error: +".$message."');</script>";
	  echo "<script>window.location.assign('http://localhost/Project/website/login.html');</script>";
	  exit;
	}//backToLogin
?>
