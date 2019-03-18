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
  $getClothesID = "SELECT `ClothesID` FROM `CLOTHES` WHERE `StorageLink` = '".$link."';";
  $clothID = mysqli_query($connection, $getClothesID);
  $clothesID = 0;
  if ($clothID->num_rows > 0)
    echo "true";
  else
    echo "false";
?>