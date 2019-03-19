<?php
  ini_set('display_errors', 1);
  $hostname = "dbhost.cs.man.ac.uk";
  $username = "n33565af";
  $password = "databasepass";
  $dbName = "2018_comp10120_w1";

  //Make a conncection to the database
  $connection = new mysqli($hostname, $username, $password, $dbName);
  //Check connection
  if ($connection->connect_error)
  {
    die("Connection failed: ".$connection->connect_error);
  }
  
  $link = $_POST['source'];
  //Get userID
  session_start();
  $userID = $_SESSION['uid'];
  //echo "UserID: ".$userID;
  //Get the clothesID's first
  $getClothesID = "SELECT `ClothesID` FROM `CLOTHES` WHERE `StorageLink` = '".$link."';";
  $clothID = mysqli_query($connection, $getClothesID);
  if ($clothID->num_rows > 0)
  {
    while($row = $clothID->fetch_assoc()) {
      //Run query to find which clothes a specific user has as favourites
      $checkFavourites = "SELECT `ClothesID` FROM `USERS_CLOTHES` WHERE `UserID` = '".$userID."' AND `ClothesID` = '".$row['ClothesID']."';";
      $favs = mysqli_query($connection, $checkFavourites);
      //echo "ClothID: ".$row['ClothesID'];
      if ($favs->num_rows > 0)
        echo "true";
      else
        echo "false";
    }
  }
  //else do nothing
  mysqli_close($connection);
?>
