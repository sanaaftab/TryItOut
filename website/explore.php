<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="icon.png" type="image/png">
  <title>Explore</title>

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

  session_start();

  $loggedIn = "true";
  if(!isset($_SESSION['uid']))
    $loggedIn = "false";

	//SQL query to return all links in descending order
	$sqlquery = "SELECT StorageLink, UserID
				 FROM OUTFITS WHERE IsPublic = 1
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
    <!-- /#sidebar-wrapper -->

    <!-- Page Content-->
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
                    <h1 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1" style="color:black">EXPLORE</h1>



                </div>
            </div>
        </div>
    </section>


      <div class="container-fluid">


        <!--
        <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>
        -->
        <!-- Page Features -->
        <div class="row text-center">


          <ye id="ye" >
          </ye>
        <!-- /.row -->

        <!-- Page Features -->

        <!-- /.row -->
      </div>
      </div>
      <script>

	var element  = document.getElementById('ul');
	var fragment = document.createDocumentFragment();

	//array of objects returned from php
	var outfitsObjArray =<?php echo json_encode($outfitsList) ?>;
	 //function creates html takes two parameters which decide picture and and link on click
	function createPicDiv(StorageLink, UserName){
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
    image.onclick = function(){
      var refNumber = StorageLink.split("/");
      refNumber = refNumber[1].split(".")[0];
      window.location.href = "outfit.php?o="+refNumber;
    };


		let div3 = document.createElement("div");
		div3.className = "card-footer";

		let favButton = document.createElement("a");
		favButton.className = "btn btn-primary";
		favButton.href = "#";
		favButton.innerHTML = "Add to Favourites";

        let p = document.createElement("p");
        p.className = "text-right";
        p.innerHTML = "Uploaded by: " + UserName;
		fragment.appendChild(div1);
		div1.appendChild(div2);
		div2.appendChild(image);
		div2.appendChild(div3);
		div3.appendChild(p);
		ye.appendChild(fragment);
	}

	var index;
	for (index = 0; index < outfitsObjArray.length ; index++){
		createPicDiv(outfitsObjArray[index]['StorageLink'], outfitsObjArray[index]['UserName']);//, clothesObjArray[index]['ShopLink']);
	}




//	var test = "/clothes/h&m/Shirt_2.png";
//	document.getElementById("testImg").src = test;

	//for array length
	//create html with unique id and pic associated with
</script>
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
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  -->

</body>

</html>
