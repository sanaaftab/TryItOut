<?php
  session_start();
  ini_set('display_errors', 1);
	require_once('config.inc.php');
	//make connection
	$connection = new mysqli($hostname, $mysqlusername, $mysqlpassword, $dbName);
	if($connection->connect_error)
		die("Connection failed: ".$connection->connect_error);
		
  $userEmail = $_SESSION['userEmail'];
  $idQuery = mysqli_prepare($connection, "SELECT `UserID` FROM `USERS` WHERE `Email` = ?;");
	mysqli_stmt_bind_param($idQuery, "s", $userEmail);
	mysqli_stmt_execute($idQuery);
	mysqli_stmt_bind_result($idQuery, $userID);
	mysqli_stmt_fetch($idQuery);
	mysqli_stmt_close($idQuery);
	$_SESSION['uid'] = $userID;
  echo "<script>window.location.assign('explore.php');</script>";
?>
