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

$removeClothesOutfits = "DELETE FROM `CLOTHES_OUTFITS` WHERE `OutfitID` = '".$OutfitID."';";
if ($connection->query($removeClothesOutfits) === TRUE) {
    echo "";
} else {
    echo "Error deleting record: " . $connection->error;
}

$removeOutfit = "DELETE FROM `OUTFITS` WHERE `OutfitID` = '".$OutfitID."';";
if ($connection->query($removeOutfit) === TRUE) {
    echo "Outfit deleted succesfully";
} else {
    echo "Error deleting record: " . $connection->error;
}

mysqli_close($connection);
?>
