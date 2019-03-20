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

//figure out OutfitID
$getOutfitID = "SELECT `OutfitID` FROM `OUTFITS` WHERE `StorageLink` = '".$location."';";
  $result = mysqli_query($connection, $getOutfitID);
  if (!$result) {
    trigger_error('Invalid query: ' . $connection->error);
  }
  if ($result->num_rows > 0){
    while($row = $result->fetch_assoc())
    {
      $OutfitID = $row["OutfitID"];
    }
  }else{
    echo "Could not determine outfit ID";
  }




  $ClothesID = array();

//get all clothes in that outfit
  $getClothesID = "SELECT `ClothesID` FROM `CLOTHES_OUTFITS` WHERE `OutfitID` = '".$OutfitID."'";
  $result = mysqli_query($connection, $getClothesID);
  if (!$result) {
    trigger_error('Invalid query: ' . $connection->error);
  }
  if ($result->num_rows > 0){
    while($row = mysqli_fetch_assoc($result))
    {
      array_push($ClothesID, $row["ClothesID"]);
    }
  }else{
    echo "Could not determine clothes ID";
  }

  echo count($ClothesID)." ";
  foreach($ClothesID as $ID){
    echo $ID." ";

    //get the info for each clothe
    $getClothesInfo = "SELECT `StorageLink`, `ShopLink` FROM `CLOTHES` WHERE `ClothesID` = '".$ID."';";
    $result = mysqli_query($connection, $getClothesInfo);
    if (!$result) {
      trigger_error('Invalid query: ' . $connection->error);
    }
    if ($result->num_rows > 0){
      while($row = mysqli_fetch_assoc($result))
      {
        echo $row["StorageLink"]." ".$row["ShopLink"]." ";
      }
    }else{
      echo "Could not determine clothes info";
    }
  }//for-each
  mysqli_close($connection);
?>
