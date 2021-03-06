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
  <title>Contact Us</title>
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
    session_start();

    $loggedIn = "true";
    if(!isset($_SESSION['uid'])) {
      $loggedIn = "false";
  	}
  ?>
</head>

<body>
  <!-- The navigation bar on the side containing links to the other pages -->
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
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
          <div class="media-container-row" style="height: 700px;">
            <div class="title col-12 col-md-8">
              <h1 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1" style="color:black">CONTACT US</h1>
                <h5 style="padding-top: 30px;">If you would like to get in touch, please email us at: </h5>
                <h5 style="padding-left: 50px;">contactus.tryitout@gmail.com </h5>
                <h5 style="padding-top: 30px;">Our address is: </h5>
                <h5 style="padding-left: 50px;">Kilburn Building,</h5>
                  <h5 style="padding-left: 50px;"> University of Manchester, </h5>
                    <h5 style="padding-left: 50px;">Oxford Rd,</h5>
                      <h5 style="padding-left: 50px;"> Manchester </h5>
                        <h5 style="padding-left: 50px;">M13 9PL</h5>
            </div>
          </div>
        </div>
      </section>

      <section once="" class="cid-rkenftQKle" id="footer7-6">

        <div class="container">
            <div class="media-container-row align-center mbr-white">
              <div class="row row-links">
                  <ul class="foot-menu">
                  <li class="foot-menu-item mbr-fonts-style display-7">Developed by W1</li>
                  <li class="foot-menu-item mbr-fonts-style display-7"><a  href = "Termandconditions.php">Terms &amp; Conditions</a></li>
                  <li class="foot-menu-item mbr-fonts-style display-7"><a  href = "contactus.php">Contact Us</a></li>
                  <li class="foot-menu-item mbr-fonts-style display-7"><a  href = "permission.php">Copyright Permission</a></li></ul>

              </div>
                <div class="row row-copirayt">
                    <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                        © Copyright 2019 - All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </section>
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
