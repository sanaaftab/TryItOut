<?php
	
	ini_set('display_errors', 1);
	$hostname = "dbhost.cs.man.ac.uk";
	$mysqlusername = "n33565af";
	$mysqlpassword = "databasepass";
	$dbName = "2018_comp10120_w1";
		
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
  $fileLocation = "outfits/" .  uniqid() . ".png";
  if (file_exists("outfits/" . $fileLocation))
    $fileLocation = uniqid() . ".png";

  // SAVING THE DATA IN THE PNG FILE
  $myfile = fopen($fileLocation, "w") or die("Unable to open file!");
  fwrite($myfile, $data);
  fclose($myfile);
  
	$query = $connection->prepare("INSERT INTO OUTFITS(UserID, StorageLink)
												VALUES (?,?)");
	if($query == false)
				echo "could not create user";
				
	//binding parameters
	$tempUserID = 6;
 	$query->bind_param("ss", $tempUserID, $fileLocation);
	$query->execute();
	echo mysqli_error($connection);
	$query->close();


  //THESE ARE THE LOCATIONS OF CLOTHES
  $urls = $_POST['urlsOfClothes'];
  
  $getOutfitID = "SELECT 'OutfitID' FROM 'OUTFITS' WHERE 'StorageLink' = '".$url."';";
    $result = mysqli_query($connection, $getOutfitID);
    $OutfitID = 0;
    if ($result->num_rows > 0){
      while($row = $result->fetch_assoc())
      {
        echo "OutfitID: ".$row["OutfitID"]."<br>";
        $OutfitID = $row["OutfitID"];
      }
    }else{
      echo "Could not determine outfit ID";
    }
  
  foreach($urls as $url){
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
      echo "Could not determine ClotheID";
    }
    
    $query = $connection->prepare("INSERT INTO CLOTHES_OUTFITS(ClothesID, OutfitID)
												VALUES (?,?)");
	  if($query == false)
			echo "could not link clothe to outfit";
				
	  //binding parameters
 	  $query->bind_param("ss", $ClothesID, $OutfitID);
	  $query->execute();
	  echo mysqli_error($connection);
	  $query->close();
  }

  //you can check how they look by uncommenting this
           /*foreach($urls as $url){
              echo $url;
            }*/
  mysqli_close($connection);
?>
