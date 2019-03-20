<!DOCTYPE html>
<!-- Defining the language of the document -->
<html lang="en">
<head>
<!-- Declaring the character encoding of the HTML file -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<!-- This tag adds a title to the page -->
<title>My Account</title>
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
	$hostname = "dbhost.cs.man.ac.uk";
	$mysqlusername = "n33565af";
	$mysqlpassword = "databasepass";
	$dbName = "2018_comp10120_w1";

	//this script will return the directory address of the clothes with name of the clothes and store

	//make connection
	$connection = new mysqli($hostname, $mysqlusername, $mysqlpassword, $dbName);

	if(!$connection)
	{
		die("Connection failed. ". mysqli_connect_error());
	}

    session_start();
    if(!isset($_SESSION['uid'])) {
		header("Location: login.html");
	}
	else {
		$uID = $_SESSION['uid'];
	}
	//SQL query to return all links in descending order
	$clothesIDQuery = mysqli_prepare($connection,"SELECT ClothesID
						 	                      FROM USERS_CLOTHES
						 						  WHERE UserID = ?;");

	mysqli_stmt_bind_param($clothesIDQuery, "i", $uID);
	mysqli_stmt_execute($clothesIDQuery);
	$clothesIDResult = mysqli_stmt_get_result($clothesIDQuery);
	$clothesLinks = array();
    $clothesShops = array();
	$clothesQuery = mysqli_prepare($connection,"SELECT StorageLink, ShopLink
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
			$clothesLinks[] = $linkRow['StorageLink'];
            $clothesShops[] = $linkRow['ShopLink'];
		}
	}
	$outfitsLinks = array();
	
	$outfitsQuery = mysqli_prepare($connection,"SELECT StorageLink
						 	                    FROM OUTFITS
						 				        WHERE UserID = ?;");
						 				 
    mysqli_stmt_bind_param($outfitsQuery, "i", $uID);
    
    mysqli_stmt_execute($outfitsQuery);
    
    $outfitsResult = mysqli_stmt_get_result($outfitsQuery);
    while($row = mysqli_fetch_assoc($outfitsResult))
	{
		$outfitsLinks[] = $row['StorageLink'];
	}
	
	$usernameQuery = mysqli_prepare($connection, "SELECT Username
	                                           FROM USERS
	                                           WHERE UserID = ?;");
	                                           
    mysqli_stmt_bind_param($usernameQuery, "i", $uID);
    
    mysqli_stmt_execute($usernameQuery);
    
    $usernameResult = mysqli_stmt_get_result($usernameQuery);
    
    $username = mysqli_fetch_row($usernameResult)[0];
    
	#class ClothesClass{
	#	public $StorageLink = "";
	#	public $ShopLink= "";
	#	public $Name = "";
	#}


	mysqli_close($connection);
  ?>
</head>

<body>
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
      <button class="btn" style="position: absolute; bottom: 10px; width: 90%" >Login</button>
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
                  <h1 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1" style="color:black">MY ACCOUNT</h1>



              </div>
          </div>
      </div>
    </section>



    <div class="outer">
      <h1 style="text-align: center; padding-bottom: 10px;">Welcome <?php echo $username; ?></h1>

    <div class = "row text-center" style="height: 600px;">


      <div class="columnleft">
        <h2>MY DESIGNS</h2>
        <div class="container">

                <ya id="ya" >
                </ya>

          <a class="prev" onclick="plusSlides(-1)">❮</a>
          <a class="next" onclick="plusSlides(1)">❯</a>
<script>

	var element  = document.getElementById('ul');
	var fragment = document.createDocumentFragment();

	//array of objects returned from php
	var outfitsLinks =<?php echo json_encode($outfitsLinks) ?>;
	function createPicDiv(StorageLink){
		let div1 = document.createElement("div");
		div1.className = "container";
		div1.style.width = "100%";
		
        let div2 = document.createElement("div");
        div2.className = "mySlides";
		let image = new Image();
		image.src = StorageLink;
		image.style.width = "100%";

		fragment.appendChild(div1);
		div1.appendChild(div2);
		div2.appendChild(image);
		ya.appendChild(fragment);
	}
	
	var index;
	for (index = 0; index < outfitsLinks.length ; index++){
		createPicDiv(outfitsLinks[index])
	}
</script>
<!-- might need to remove this bottom feature entirely as im confused on how it works -->

      <!--    <div class="row">
            <div class="imagecolumn">
              <!--https://www.newlook.com/row/mens/clothing/shirts/pale-blue-long-sleeve-denim-shirt-/p/595247345?comp=Browse
              https://www.newlook.com/uk/mens/clothing/shirts/pale-blue-long-sleeve-denim-shirt-/p/595247345?comp=Browse-->
      <!--        <img class="demo cursor" src="outfit1.jpg" style="width:30%" onclick="currentSlide(1)" >
            </div>
            <div class="imagecolumn">
              <!--https://www.newlook.com/uk/mens/clothing/jackets-coats/dark-grey-jersey-sleeve-denim-jacket/p/611401103?comp=Browse-->
      <!--        <img class="demo cursor" src="outfit2.jpg" style="width:30%" onclick="currentSlide(2)" >
            </div>

            <div class="imagecolumn">
              <!--https://www.newlook.com/uk/mens/clothing/jackets-coats/dark-grey-jersey-sleeve-denim-jacket/p/611401103?comp=Browse-->
        <!--      <img class="demo cursor" src="outfit3.jpg" style="width:30%" onclick="currentSlide(3)" >
            </div>

      <  </div> -->
      </div>


            <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
              showSlides(slideIndex += n);
            }

            function currentSlide(n) {
              showSlides(slideIndex = n);
            }

            function showSlides(n) {
              var i;
              var slides = document.getElementsByClassName("mySlides");
        //  var dots = document.getElementsByClassName("demo");
              var captionText = document.getElementById("caption");
              if (n > slides.length) {slideIndex = 1}
              if (n < 1) {slideIndex = slides.length}
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
              }
          //    for (i = 0; i < dots.length; i++) {
          //      dots[i].className = dots[i].className.replace(" active", "");
          //    }
              slides[slideIndex-1].style.display = "block";
          //    dots[slideIndex-1].className += " active";
          //    captionText.innerHTML = dots[slideIndex-1].alt;
            }
            </script>
          </div>

          <div class="columnright">
            <h2>FAVORITES</h2>
              <div class="scroll">
                <div class="row text-center">
                  <!---.col-md- (medium devices - screen width equal to or greater than 768px)
                       .col-lg- (large devices - screen width equal to or greater than 992px)
                        mb-  margin bottom-->
                <ye id="ye" >
                </ye>
<script>

	var element  = document.getElementById('ul');
	var fragment = document.createDocumentFragment();

	//array of objects returned from php
	var clothesLinks =<?php echo json_encode($clothesLinks) ?>;
    var clothesShops =<?php echo json_encode($clothesShops) ?>;
	 //function creates html takes two parameters which decide picture and and link on click
	function createPicDiv(StorageLink, ShopLink){
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
        image.onclick = function(){window.location.href = ShopLink};




		fragment.appendChild(div1);
		div1.appendChild(div2);
		div2.appendChild(image);
		ye.appendChild(fragment);
	}

	var index;
	for (index = 0; index < clothesLinks.length ; index++){
		createPicDiv(clothesLinks[index], clothesShops[index]);//, clothesObjArray[index]['ShopLink']);
	}




//	var test = "/clothes/h&m/Shirt_2.png";
//	document.getElementById("testImg").src = test;

	//for array length
	//create html with unique id and pic associated with
</script>

        </div>
      </div>
    </div>
  </div>
</div>

    <section once="" class="cid-rkenftQKle" id="footer7-6">

      <div class="container" style="bottom: 0px;">
          <div class="media-container-row align-center mbr-white">
              <div class="row row-links">
                <ul class="foot-menu">
                  <li class="foot-menu-item mbr-fonts-style display-7">Developed by W1</li>
                  <li class="foot-menu-item mbr-fonts-style display-7"><a  href = "Termandconditions.html">Terms &amp; Conditions</a></li>
                  <li class="foot-menu-item mbr-fonts-style display-7">Contact Us</li>
                  </ul>    </div>
              <div class="row social-row">
                  <div class="social-list align-right pb-2">


                  <div class="soc-item">
                          <a href="https://gitlab.cs.man.ac.uk/n81233sa/Project.git" target="_blank">
                              <span class="mbr-iconfont mbr-iconfont-social mbri-opened-folder" style="color: rgb(244, 133, 114); fill: rgb(244, 133, 114);"></span>
                          </a>
                      </div><div class="soc-item">
                          <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                              <span class="mbr-iconfont mbr-iconfont-social mbrib-shopping-bag" style="color: rgb(244, 133, 114); fill: rgb(244, 133, 114);"></span>
                          </a>
                      </div></div>
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
