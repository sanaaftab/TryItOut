<?php

	ini_set('display_errors', 1);
	require_once('config.inc.php');

	//make connection
	$connection = new mysqli($hostname, $mysqlusername, $mysqlpassword, $dbName);

	if(!$connection)
	{
		die("Connection failed. ". mysqli_connect_error());
	}

  // GETS THE DATA OF THE IMAGE AND DECODES IT.
  $data =  $_POST["imageData"];

  if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
    $data = substr($data, strpos($data, ',') + 1);
    $type = strtolower($type[1]); // jpg, png, gif

    if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
        throw new \Exception('invalid image type');
    }

    $data = base64_decode($data);

    if ($data === false) {
      throw new \Exception('base64_decode failed');
      }
  } else {
    throw new \Exception('did not match data URI with image data');
  }

  //figuring out a unique location for the outfit
	$return = uniqid();
  $fileLocation = "outfits/" . $return . ".png";
  while (file_exists($fileLocation)){
		$return = uniqid();
    $fileLocation = "outfits/" . $return . ".png";
	}

  // SAVING THE DATA IN THE PNG FILE
  $myfile = fopen($fileLocation, "w") or die("Unable to open file!");
  fwrite($myfile, $data);
  fclose($myfile);

	$query = $connection->prepare("INSERT INTO OUTFITS(UserID, StorageLink, IsPublic)
												VALUES (?,?,?)");
	if($query == false)
				echo "could not create user";


  $IsPublic = $_POST["IsPublic"];
	//binding parameters
	session_start();
  $tempUserID = $_SESSION['uid'];
 	$query->bind_param("sss", $tempUserID, $fileLocation, $IsPublic);
	$query->execute();
	echo mysqli_error($connection);


  //THESE ARE THE LOCATIONS OF CLOTHES
  $urls = $_POST['urlsOfClothes'];

  $getOutfitID = "SELECT `OutfitID` FROM `OUTFITS` WHERE `StorageLink` = '".$fileLocation."';";
    $result = mysqli_query($connection, $getOutfitID);
    $OutfitID = 0;
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

  foreach($urls as $url){
    $getClothesID = "SELECT `ClothesID` FROM `CLOTHES` WHERE `StorageLink` = '".$url."';";
    $result1 = mysqli_query($connection, $getClothesID);
    $clothesID = 0;
    //echo "ClothID: ".$clothID."<br>";
    if ($result1->num_rows > 0)
    {
      while($row = $result1->fetch_assoc())
      {
        $clothesID = $row["ClothesID"];
      }
    }
    else
    {
      echo "Could not determine ClotheID";
    }

    $query = $connection->prepare("INSERT INTO CLOTHES_OUTFITS(ClothesID, OutfitID)
												VALUES (?,?)");
	  if($query == false)
			echo "could not link clothe to outfit";

	  //binding parameters
 	  $query->bind_param("ss", $clothesID, $OutfitID);
	  $query->execute();
	  echo mysqli_error($connection);
	  $query->close();
  }

  //you can check how they look by uncommenting this
           /*foreach($urls as $url){
              echo $url;
            }*/
	echo "outfit.php?o=".$return;
  mysqli_close($connection);
?>
