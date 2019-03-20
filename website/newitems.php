<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Clothes</title>

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
  <link rel="stylesheet" href="fav-btn.css">

  <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
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

  $loggedIn = "true";
  if(!isset($_SESSION['uid'])) {
		header("Location: login.html");
    $loggedIn = "false";
	}
	else {
		$uID = $_SESSION['uid'];
	}
	//SQL query to return all links in descending order
	$sqlquery = "SELECT Name, ShopLink, StorageLink
				FROM CLOTHES
			    ORDER BY ClothesID DESC";

	$result = mysqli_query($connection,$sqlquery)or die(mysqli_error($connection));

	#class ClothesClass{
	#	public $StorageLink = "";
	#	public $ShopLink= "";
	#	public $Name = "";
	#}

	$clothesList = array();
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_assoc($result)){
	#		$ClothesObject = new ClothesClass();
			#$ClothesObject->StorageLink = $row['StorageLink'];
	#		$ClothesObject->ShopLink = $row['ShopLink'];
	#		$ClothesObject->Name = $row['Name'];
			$clothesList[] = array("StorageLink" => $row['StorageLink'],  "ShopLink" => $row['ShopLink'], "Name" => $row['Name']);
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
            window.location = "login.html";
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
                    <h1 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1" style="color:black">Clothes</h1>



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
<script>

	var element  = document.getElementById('ul');
	var fragment = document.createDocumentFragment();

	//array of objects returned from php
	var clothesObjArray =<?php echo json_encode($clothesList) ?>;

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
		image.onclick = function(){window.location.href = ShopLink};
		image.style.height = 'auto';
		image.style.width = 200;


		let div3 = document.createElement("div");
		div3.className = "card-footer";

    let favButton = document.createElement("favButton");
		favButton.className = "btn btn-primary";
	  favButton.innerHTML = "N/A";
	  var link = StorageLink;
	  //var bool = "t/f"
	  favButton.onclick = function () {

      var isFavourite = "t/f";
      if(favButton.innerHTML === "Add to favourites")
        isFavourite = "false";
      else if(favButton.innerHTML === "Remove from favourites")
        isFavourite = "true";

      $.post("fav-btn.php", {source: link, favs: isFavourite})
       .done(function(data) {
         if(isFavourite === "true")
            favButton.innerHTML = "Add to favourites";
         else if (isFavourite === "false")
            favButton.innerHTML = "Remove from favourites";
       });
	  };

		fragment.appendChild(div1);
		div1.appendChild(div2);
		div2.appendChild(image);
		div2.appendChild(div3);
		div3.appendChild(favButton);
		ye.appendChild(fragment);


	  //After the webpage has loaded, execute this function
	  window.addEventListener("load", function(){
      $.post("newitems-fav.php", {source: link})
       .done(function(data){bool = data;
                         if (bool === "true")
                   	      favButton.innerHTML = "Remove from favourites";
                   	    else if (bool === "false")
                   	      favButton.innerHTML = "Add to favourites";
                   	    else
                   	      favButton.innerHTML = "Change me";
      });
    });

	}

	var index;
	for (index =0; index < clothesObjArray.length ; index++){
		createPicDiv(clothesObjArray[index]['StorageLink'], clothesObjArray[index]['ShopLink']);
	}




//	var test = "/clothes/h&m/Shirt_2.png";
//	document.getElementById("testImg").src = test;

	//for array length
	//create html with unique id and pic associated with
</script>



        </div>
        <!-- /.row -->
      </div>

      <section once="" class="cid-rkenftQKle" id="footer7-6">





        <div class="container">
            <div class="media-container-row align-center mbr-white">
                <div class="row row-links">
                    <ul class="foot-menu">





                    <li class="foot-menu-item mbr-fonts-style display-7">Developed by W1</li><li class="foot-menu-item mbr-fonts-style display-7"><a  href = "Termandconditions.html">Terms &amp; Conditions</a></li><li class="foot-menu-item mbr-fonts-style display-7">Contact Us</li></ul>
                </div>
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
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="fav-btn.js"></script>
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
