<?php
	ini_set('display_errors', 1);
	$hostname = "dbhost.cs.man.ac.uk";
	$mysqlusername = "n33565af";
	$mysqlpassword = "databasepass";
	$dbName = "2018_comp10120_w1";
	
	$Email = $_POST["EmailPost"];
	$Password = $_POST["PasswordPost"];
	//Check if any data has been entered first
	if ($Email === "" || $Password === "")
	{
    backToLogin('EMail and Password can not be left blank!');
	}
	//make connection
	$connection = new mysqli($hostname, $mysqlusername, $mysqlpassword, $dbName);
	//check connection
	if(!$connection)
		die("Connection failed. ". mysqli_connect_error());

  //Query to fecth users row based on email entry
	$emailQuery = "SELECT * FROM `USERS` WHERE `Email` = '".$Email."';";
	$checkEmail = mysqli_query($connection, $emailQuery);
	//If email exists, check the password against the database
	if ($row = $checkEmail->fetch_assoc())
	{
	  if ($row['Password'] === $Password)
	  {
	    //If both email and pass are correct make a new session and assignt he userID
	    session_start();
	    $_SESSION['uid'] = $row['UserID'];
	    header('Location: explore.php');
    }
  } 
  
	function backToLogin($message)
	{
	  echo "<script>alert('Fatal error: ' + ".$message.");</script>";
	  header('Location: http://localhost/Project/website/login.html');
	  exit;
	}//backToLogin
  
?>
