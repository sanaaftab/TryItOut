<!DOCTYPE html>
<!-- Defining the language of the document -->
<html lang="en">

<head>
  <!-- Declaring the character encoding of the HTML file -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <link rel="icon" href="icon.png" type="image/png">
  <!-- This tag adds a title to the page -->
  <title>Create</title>
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

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

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

    session_start();

    $loggedIn = "true";
    if(!isset($_SESSION['uid'])) {
		header("Location: login.php");
      $loggedIn = "false";
	}
	else {
		$uID = $_SESSION['uid'];
	};




  $clothesIDQuery = mysqli_prepare($connection,"SELECT ClothesID
						 	                      FROM USERS_CLOTHES
						 						  WHERE UserID = ?;");

	mysqli_stmt_bind_param($clothesIDQuery, "i", $uID);
	mysqli_stmt_execute($clothesIDQuery);
	$clothesIDResult = mysqli_stmt_get_result($clothesIDQuery);
	$clothesLinks = array();
	$clothesQuery = mysqli_prepare($connection,"SELECT StorageLink
						 	                    FROM CLOTHES
						 				        WHERE ClothesID = ?;");
	if(mysqli_num_rows($clothesIDResult) > 0)
	{
		//save image links in array
		while($row = mysqli_fetch_assoc($clothesIDResult))
		{
			mysqli_stmt_bind_param($clothesQuery, "i", $row['ClothesID']);
			mysqli_stmt_execute($clothesQuery);
			$clothesResult = mysqli_stmt_get_result($clothesQuery);
			$linkRow = mysqli_fetch_assoc($clothesResult);
			print_r(mysqli_fetch_row($clothesResult));
			$clothesLinks[] = array("StorageLink" => $linkRow['StorageLink']);
		}
	}

	mysqli_stmt_bind_param($clothesQuery, "i", $cID);






  //SQL query to return all links in descending order
	$sqlquery = "SELECT Name, ShopLink, StorageLink
				FROM CLOTHES
			    ORDER BY ClothesID DESC";

	$result = mysqli_query($connection,$sqlquery)or die(mysqli_error($connection));

	$clothesList = array();
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result)){

			$clothesList[] = array("StorageLink" => $row['StorageLink'],  "ShopLink" => $row['ShopLink'], "Name" => $row['Name']);
		}
	}
		else echo "Does not exist" ;


	mysqli_close($connection);

  ?>
</head>

<body  onload="displayAll(clothesObjArray)">
  <!-- The navigation bar on the side containing links to the other pages -->
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <!--<div class="sidebar-heading">TRY IT OUT</div>-->
      <a href="explore.php"><img src="logo.png" width="250px"></a>
      <div class="list-group list-group-flush">
        <a href="explore.php" class="list-group-item list-group-item-action bg-light">Explore</a>
        <a href="newitems.php" class="list-group-item list-group-item-action bg-light">Clothes</a>
        <a href="create.php" class="list-group-item list-group-item-action bg-light">Create</a>
        <a href="myaccount.php" class="list-group-item list-group-item-action bg-light">My Account</a>
      </div>
      <button id="login/logout" class="btn" style="position: absolute; bottom: 10px; width: 90%" >Login</button>
      <script>
        var loginButton = document.getElementById("login/logout");
        var isLoggedIn = "<?php echo $loggedIn; ?>";
        if (isLoggedIn === "true")
          loginButton.innerHTML = "Logout";

        loginButton.addEventListener("click", function(){
          if (loginButton.innerHTML === "Login")
            window.location = "login.php";
          else {
            window.location = "logout.php";
          }
        });
      </script>
    </div>

    <!-- Page content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Brands
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="https://www2.hm.com/en_gb/index.html">H&M</a>
                <a class="dropdown-item" href="https://www.newlook.com/uk/womens">New Look</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <section class="mbr-section content5 cid-rkevoHCWt8 mbr-parallax-background" id="content5-7">
        <div class="container">
          <div class="media-container-row">
            <div class="title col-12 col-md-8">
              <h1 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1" style="color:black">CREATE</h1>
            </div>
          </div>
        </div>
      </section>


      <div class="row text-center" style="padding-top: 30px;">
        <!--************************For the drag and drop*****************************-->
        <div class="columnleft">

          <link rel="stylesheet" type="text/css" href="dropboxstylesheet.css">
          <script src="https://unpkg.com/konva@2.4.2/konva.min.js"></script>


          <div id="dropbox">
            <div id="container" class="size" style="position: absolute" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            <script src="dropboxscript.js"></script>
            </script>
          </div>
          <br>

          <div class="upload-btn-wrapper">
            <a role="button"></a>
            <input class="btn" type="file" name="myImage" accept="image/*" />
            <button class="btn" onclick="uploadImage()">UPLOAD</button>
            <button class="btn" onclick="saveImage(0)">SAVE</button>
            <button class="btn" onclick="saveImage(1)">SAVE and SHARE</button>
          </div>

        </div>

        <!--************************The selection of clothes*****************************-->
        <div class="columnright">

          <div>
            <button class="btn" onclick="displayAll(clothesObjArray)" >SHOW ALL</button>
            <button class="btn" onclick="displayAll(favClothesObjArray)" >FAVORITES</button>
          </div>
          <div class="scroll">
            <div class="row text-center">


					<ye id="ye" >
          </ye>
<script>

	var element  = document.getElementById('ul');
	var fragment = document.createDocumentFragment();

	//array of objects returned from php
	var clothesObjArray =<?php echo json_encode($clothesList) ?>;
  var favClothesObjArray =<?php echo json_encode($clothesLinks) ?>;

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
		//image.onclick = function(){window.location.href = ShopLink};
		image.style.height = 'auto';
		image.style.width = 200;
    image.draggable = 'true';
    image.addEventListener("dragstart", function() {drag(event)}, false);

		let div3 = document.createElement("div");
		div3.className = "card-footer";


		fragment.appendChild(div1);
		div1.appendChild(div2);
		div2.appendChild(image);
		ye.appendChild(fragment);

	}

	var index, objArray;
  function displayAll(objArray){
    ye.innerHTML = '';
    for (index =0; index < objArray.length ; index++){
      createPicDiv(objArray[index]['StorageLink']);
    }
  }

</script>

            </div>
          </div>
        </div>
      </div>
      <section once="" class="cid-rkenftQKle" id="footer7-6">

        <div class="container">
            <div class="media-container-row align-center mbr-white">
              <div class="row row-links">
                  <ul class="foot-menu">
                  <li class="foot-menu-item mbr-fonts-style display-7">Developed by W1</li>
                  <li class="foot-menu-item mbr-fonts-style display-7"><a  href = "Termandconditions.php">Terms &amp; Conditions</a></li>
                  <li class="foot-menu-item mbr-fonts-style display-7"><a  href = "contactus.php">Contact Us</a></li>
              </div>
                <div class="row row-copirayt">
                    <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                        © Copyright 2019 - All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </section>
    </div>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
