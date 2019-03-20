<?php
  ini_set('display_errors', 1);
  require_once('config.inc.php');

  //make connection
	$connection = new mysqli($hostname, $mysqlusername, $mysqlpassword, $dbName);

  if(!$connection)
	{
		exit("Outfit Not Found");
	}

  $location = $_POST["location"];


  //getting the user ID
  $getUserID = "SELECT `UserID` FROM `OUTFITS` WHERE `StorageLink` = '".$location."';";
  $result = mysqli_query($connection, $getUserID);

  if (!$result) {
    exit("Outfit Not Found");
  }
  if ($result->num_rows > 0){
    while($row = $result->fetch_assoc())
    {
      $UserID = $row["UserID"];
    }
  }else{
    exit("Outfit Not Found");
  }

  //getting UserName
  $getUsername = "SELECT `Username` FROM `USERS` WHERE `UserID` = '".$UserID."';";
  $result = mysqli_query($connection, $getUsername);

  if (!$result) {
    exit("Outfit Not Found");
  }
  if ($result->num_rows > 0){
    while($row = $result->fetch_assoc())
    {
      $Username = $row["Username"];
    }
  }else{
    exit("Outfit Not Found");
  }

  mysqli_close($connection);

  echo $Username;
?>
