<?php
ini_set('display_errors', 1);
require_once('config.inc.php');

//make connection
$connection = new mysqli($hostname, $mysqlusername, $mysqlpassword, $dbName);

if(!$connection)
{
  exit("Outfit Not Found");
}

session_start();

$location = $_POST["location"];

//figure out UserID
$getUserID = "SELECT `UserID` FROM `OUTFITS` WHERE `StorageLink` = '".$location."';";
  $result = mysqli_query($connection, $getUserID);
  if (!$result) {
    trigger_error('Invalid query: ' . $connection->error);
  }
  if ($result->num_rows > 0){
    while($row = $result->fetch_assoc())
    {
      $UserID = $row["UserID"];
      echo $UserID;
    }
  }else{
    echo "Could not determine user ID";
  }
  mysqli_close($connection);

?>
