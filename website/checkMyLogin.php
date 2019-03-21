<?php
	ini_set('display_errors', 1);
	require_once('config.inc.php');


	$Email = $_POST["EmailPost"];
	$Password = $_POST["PasswordPost"];
	//Check if any data has been entered first
	if ($Email === "" || $Password === "")
    backToLogin('Email and Password can not be left blank!');

	//make connection
	$connection = new mysqli($hostname, $mysqlusername, $mysqlpassword, $dbName);
	//check connection
	if(!$connection)
		die("Connection failed. ". mysqli_connect_error());

  //Query to fecth users row based on email entry
	$emailQuery = mysqli_prepare($connection, "SELECT `Email` FROM `USERS` WHERE `Email` = ?;");
	mysqli_stmt_bind_param($emailQuery, "s", $Email);
	mysqli_stmt_execute($emailQuery);
	mysqli_stmt_bind_result($emailQuery, $userEmail);
	mysqli_stmt_fetch($emailQuery);
	mysqli_stmt_close($emailQuery);
	//If email exists, check the password against the database
	if ($userEmail === $Email)
	{
	  //Query to fecth users password based on email entry
	  $passQuery = mysqli_prepare($connection, "SELECT `Password` FROM `USERS` WHERE `Email` = ?;");
	  mysqli_stmt_bind_param($passQuery, "s", $Email);
	  mysqli_stmt_execute($passQuery);
	  mysqli_stmt_bind_result($passQuery, $userPass);
	  mysqli_stmt_fetch($passQuery);
	  mysqli_stmt_close($passQuery);
	  if ($userPass === $Password)
	  {
	    //If both email and pass are correct make a new session and assignt he userID
	    session_start();
	    //Query to fecth users id based on email entry
	    $idQuery = mysqli_prepare($connection, "SELECT `UserID` FROM `USERS` WHERE `Email` = ?;");
	    mysqli_stmt_bind_param($idQuery, "s", $Email);
	    mysqli_stmt_execute($idQuery);
	    mysqli_stmt_bind_result($idQuery, $userID);
	    mysqli_stmt_fetch($idQuery);
	    mysqli_stmt_close($idQuery);
	    $_SESSION['uid'] = $userID;
	    echo "<script>window.location.assign('explore.php');</script>";
    }
    else
    {
      backToLogin('Wrong password!');
    }
  }
  else
  {
    backToLogin('Wrong email!');
  }

	function backToLogin($message)
	{
	  echo "<script>alert('Fatal error: ".$message."');</script>";
	  echo "<script>window.location.assign('login.php');</script>";
	  exit;
	}//backToLogin

?>
