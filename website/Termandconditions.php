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
  <title>Terms and Conditions</title>
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
          <div class="media-container-row">
            <div class="title col-12 col-md-8">
              <h1 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1" style="color:black">TERMS AND CONDITIONS<</h1>
                <p>Terms and Conditions ("Terms")</p>
                <p>
              Please read these Terms and Conditions ("Terms", "Terms and Conditions") carefully before using the http://www.tryitout.com  website operated by Group W1 ("us", "we", or "our").

              Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.

              By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.
              </p>

              <h3>Content</h3>
              <p>
              Our Service allows you to post, link, store, share and otherwise make available certain information, text, graphics, or other material ("Content"). You are responsible for the content you create. The copyright of the image of the clothing belonging to their fashion retail company. The copyright of the content you upload belongs to you. By sharing your content to the Explore page of the website, you automatically give us consent of using your content for advertisement purposes.
              </p>
              <h3>Links To Other Web Sites</h3>
              <p>
              Our Service may contain links to third-party websites or services that are not owned or controlled by  Group W1.

              Group W1 has no control over and assumes no responsibility for, the content, privacy policies, or practices of any third party websites or services. You further acknowledge and agree that Group W1 shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with the use of or reliance on any such content, goods or services available on or through any such websites or services.
              </p>
              <h3>Condition of use</h3>
              <p>
              As a condition of use, you promise not to use the service for any purpose that is unlawful and prohibited by these terms.
              By way of example, and not as a limitation, you agree not to use the Services:
              If you are under 16 years old;
              To abuse, harass, threaten, impersonate or intimidate any person;
              To post or transmit any Content that is abusive, offensive, pornographic, or that infringes any copyright or any right of any person;
              To create multiple accounts for the purpose of voting for or against users' Content;
              For any purpose that is not permitted under the laws of the country/jurisdiction where you use the Service.
              </p>
              <h3>Changes</h3>
              <p>
              We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is needed we will try to provide at least 15 days' notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.
              </p>
              <h6 align="right">
                Last updated: (06 Dec 2018)
              </h6>
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
