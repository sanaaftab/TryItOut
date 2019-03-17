<?php
  ini_set('display_errors', 1);
  $hostname = "dbhost.cs.man.ac.uk";
  $username = "n33565af";
  $password = "databasepass";
  $dbName = "2018_comp10120_w1";

  //Make a conncection to the database
  $connection = new mysqli($hostname, $username, $password, $dbName);

  if ($connection->connect_error)
  {
    die("Connection failed: ".$connection->connect_error);
  }
  else
  {
    echo "Connection succesful!";
  }
  
  /*
  If favourite button passes "true" value:
  To get clothes ID, get the image source as a string
  then query it as a StorageLink to retrieve the ID from the
  database, then add that ID into the favourites.
  To get user ID, need session that temporarily hold the username
  until the user logs out or the website is inactive.
  If favourite button passes "false" value:
  Search for the clothe ID and delete from database.
  */
  //Get favourite option (add/remove) as boolean String
  $favourite = $_POST['favs'];
  echo "Favourite: ".$favourite."<br>";
  //Get cloth source from HTML
  $link = $_POST['source'];
  echo "Image source: ".$link."<br>";
  //SELECT Query on database
  //Get the actual clothID from the database using StorageLink
  $getClothesID = "SELECT `ClothesID` FROM `CLOTHES` WHERE `StorageLink` = '".$link."';";
  $clothID = mysqli_query($connection, $getClothesID);
  //echo "ClothID: ".$clothID."<br>";
  if ($clothID->num_rows > 0)
  {
    while($row = $clothID->fetch_assoc())
    {
      echo "ClotheID: ".$row["ClothesID"]."<br>";
    }
  }
  else
  {
    echo "No results found";
  }
  //Find userID
  $userID = 5;
  echo "UserID: ".$userID."<br>";
  if ($favourite === "true")
  {
    //INSERT Query on database
    //REMEMBER TO CHANGE FORM TEST DATA INTO ACTUAL DATABASE DATA
    $insertQuery = "INSERT INTO `USERS_CLOTHES`(`UserID`, `ClothesID`) ".
                   "VALUES (".$userID.",".$row["ClothesID"].");";
    mysqli_query($connection, $insertQuery);
    echo "Added to favourites."; // Check if insert query didnt send errors back
  }
  else if ($favourite === "false")
  {
    $deleteQuery = "DELETE FROM `test` WHERE `ClothesID` = ".$row["ClothesID"].";";
    mysqli_query($connection, $deleteQuery);
    echo "Removed from favourites."; // Check if insert query didnt send errors back
  }
  //Close the connection when finished
  mysqli_close($connection);
?>