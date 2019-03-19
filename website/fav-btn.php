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
  $clothesID = 0;
  //echo "ClothID: ".$clothID."<br>";
  if ($clothID->num_rows > 0)
  {
    while($row = $clothID->fetch_assoc())
    {
      echo "ClotheID: ".$row["ClothesID"]."<br>";
      $clothesID = $row["ClothesID"];
    }
  }
  else
  {
    echo "No results found";
  }
  //Find userID
  session_start();
  $userID = $_SESSION['uid'];
  
  echo "UserID: ".$userID."<br>";
  if ($favourite === "false")
  {
    //INSERT Query on database
    //REMEMBER TO CHANGE FORM TEST DATA INTO ACTUAL DATABASE DATA
    $insertQuery = "INSERT INTO `USERS_CLOTHES`(`UserID`, `ClothesID`) VALUES".
                   " (".$userID.",".$clothesID.");";
    //Execute insert query and check if it returns true at the same time
    if (mysqli_query($connection, $insertQuery))
      echo "Added to favourites.";
    else
      echo "Something went wrong while adding to favourites."."<br>".
           mysqli_error($connection);
  }
  else if ($favourite === "true")
  {
    $deleteQuery = "DELETE FROM `USERS_CLOTHES` WHERE `ClothesID` = ".$clothesID.";";
    //Execute delete query and check if it returns true at the same time
    if (mysqli_query($connection, $deleteQuery))
      echo "Removed from favourites.";
    else
      echo "Something went wrong while removing from favourites."."<br>".
           mysqli_error($connection);
  }
  //Close the connection when finished
  mysqli_close($connection);
?>
