<?php
  session_start();
  //this script will take user inputs and store in the user entity creating a new user for the website
	//database connection information
	ini_set('display_errors', 1);
	require_once('config.inc.php');

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
		die("Connection failed: ".$connection->connect_error);

	//Check if username already exists
  $userQuery = mysqli_prepare($connection, "SELECT `Username` FROM `USERS` WHERE `Username` = ?;");
	mysqli_stmt_bind_param($userQuery, "s", $Username);
	mysqli_stmt_execute($userQuery);
	mysqli_stmt_bind_result($userQuery, $userName);
	mysqli_stmt_fetch($userQuery);
	mysqli_stmt_close($userQuery);
	if ($userName === $Username)
	  backToLogin('Username already exists. Try logging in.');

	//Check if email already exists
	$emailQuery = mysqli_prepare($connection, "SELECT `Email` FROM `USERS` WHERE `Email` = ?;");
	mysqli_stmt_bind_param($emailQuery, "s", $Email);
	mysqli_stmt_execute($emailQuery);
	mysqli_stmt_bind_result($emailQuery, $userEmail);
	mysqli_stmt_fetch($emailQuery);
	mysqli_stmt_close($emailQuery);
	if ($userEmail === $Email)
	  backToLogin('Email already exists. Try logging in.');

	//Checks that the password entered was correct
	if($Password == $PasswordCheck)
	{
		//query to insert username and password to database
		//preparing parameters to help prevent sql injection
		$newUserQuery = mysqli_prepare($connection, "INSERT INTO `USERS`(`Username`, `Password`, `Email`) VALUES (?,?,?)");
    mysqli_stmt_bind_param($newUserQuery, "sss", $Username, $Password, $Email);
    mysqli_stmt_execute($newUserQuery);
    mysqli_stmt_close($newUserQuery); 
		//Sign-Up was succesfull, automatically log in the user.
		echo "<script>alert('Sign-Up was succesful!');</script>";
		$_SESSION['userEmail'] = $Email;
		$_SESSION['userPass'] = $Password;
		echo "<script>window.location.assign('autologin.php');</script>";
	}
		
	function backToLogin($message)
	{
	  echo "<script>alert('".$message."');</script>";
	  echo "<script>window.location.assign('login.html');</script>";
	  exit;
	}//backToLogin
?>
