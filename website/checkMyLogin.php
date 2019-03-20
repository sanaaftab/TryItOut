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
    backToLogin('EMail and Password can not be left blank!');
  //Check if the email is of valid format
	else if (filter_var($Email, FILTER_VALIDATE_EMAIL) === false)
	  backToLogin('Please enter a valid email.');
	  
	//make connection
	$connection = new mysqli($hostname, $mysqlusername, $mysqlpassword, $dbName);
	//check connection
	if(!$connection)
		die("Connection failed. ". mysqli_connect_error());

  //Query to fecth users row based on email entry
	$emailQuery = "SELECT * FROM `USERS` WHERE `Email` = '".$Email."';";
	$checkEmail = mysqli_query($connection, $emailQuery);
	$row = $checkEmail->fetch_assoc();
	//If email exists, check the password against the database
	if ($row['Email'] === $Email)
	{
	  if ($row['Password'] === $Password)
	  {
	    //If both email and pass are correct make a new session and assignt he userID
	    session_start();
	    $_SESSION['uid'] = $row['UserID'];
	    header('Location: explore.php');
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
	  echo "Fatal error: ".$message;
	  //header('Location: http://localhost/Project/website/login.html');
	  exit;
	}//backToLogin
  
?>
