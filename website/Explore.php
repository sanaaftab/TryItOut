<html>
<head>
 <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="stylesheet.css" rel="stylesheet">

  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <?php

	ini_set('display_errors', 1);
	require_once('config.inc.php');

	//this script will return the directory address of the clothes with name of the clothes and store

	//make connection
	$connection = new mysqli($hostname, $mysqlusername, $mysqlpassword, $dbName);


	if(!$connection)
	{
		die("Connection failed. ". mysqli_connect_error());
	}

	//SQL query to return all links in descending order
	$sqlquery = "SELECT StorageLink, UserID
				       FROM OUTFITS
				       ORDER BY OutfitID DESC;";

	$result = mysqli_query($connection,$sqlquery) or die(mysqli_error($connection));

	$userQuery = mysqli_prepare($connection,"SELECT Username
						 	                             FROM USERS
						 							                 WHERE UserID = ?;");

	$outfitList = array();

	mysqli_stmt_bind_param($userQuery, "i", $userId);

	if(mysqli_num_rows($result) > 0)
	{
		//save image links in array
		while($row = mysqli_fetch_assoc($result))
		{
			$userId = $row['UserID'];
			mysqli_stmt_execute($userQuery);
			$userResult = mysqli_stmt_get_result($userQuery);
			$outfitsList[] = array("UserName" => mysqli_fetch_row($userResult), "StorageLink" => $row['StorageLink']);
		}
	}
	else echo "Does not exist" ;

	mysqli_close($connection);
?>
</head>
<body>

          <ye id="ye" >
          </ye>
<script>

	var element  = document.getElementById('ul');
	var fragment = document.createDocumentFragment();

	//array of objects returned from php
	var outfitsObjArray =<?php echo json_encode($outfitsList) ?>;
    document.write(outfitsObjArray[0]['StorageLink']);
	 //function creates html takes two parameters which decide picture and and link on click
	function createPicDiv(StorageLink){
		let div1 = document.createElement("div");
		div1.className = "col-lg-3 col-md-6 mb-4";
		div1.style.display = "inline-block";
		div1.style.height = 500;

		let div2 = document.createElement("div");
		div2.className = "cardshadow h-100";

		let image = new Image();
		image.src = StorageLink;
		image.className = "card-img-top" ;
		image.style.height = 'auto';
		image.style.width = 200;


		let div3 = document.createElement("div");
		div3.className = "card-footer";

		let favButton = document.createElement("a");
		favButton.className = "btn btn-primary";
		favButton.href = "#";
		favButton.innerHTML = "Add to Favourites";

		fragment.appendChild(div1);
		div1.appendChild(div2);
		div2.appendChild(image);
		div2.appendChild(div3);
		div3.appendChild(favButton);
		ye.appendChild(fragment);
	}

	var index;
	for (index =0; index < outfitsObjArray.length ; index++){
		createPicDiv(outfitsObjArray[index]['StorageLink']);//, clothesObjArray[index]['ShopLink']);
	}




//	var test = "/clothes/h&m/Shirt_2.png";
//	document.getElementById("testImg").src = test;

	//for array length
	//create html with unique id and pic associated with
</script>
</body>

</html>
