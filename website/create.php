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
</head>

<body>
  <!-- The navigation bar on the side containing links to the other pages -->
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <!--<div class="sidebar-heading">TRY IT OUT</div>-->
      <img src="logo.png" width="250px">
      <div class="list-group list-group-flush">
        <a href="explore.php" class="list-group-item list-group-item-action bg-light">Explore</a>
        <a href="newitems.php" class="list-group-item list-group-item-action bg-light">New Items</a>
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
              <h1 class="align-center mbr-bold mbr-white pb-3 mbr-fonts-style display-1" style="color:black">CREATE</h1>
            </div>
          </div>
        </div>
      </section>


      <div class="row">
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
            <button class="btn" onclick="saveImage()">SAVE</button>
            <button class="btn" onclick="saveImage()">SAVE and SHARE</button>
          </div>

        </div>

        <!--************************The selection of clothes*****************************-->
        <div class="columnright">

          <div>
            <button class="btn active">SHOW ALL</button>
            <button class="btn" >FAVORITES</button>
          </div>
          <div class="scroll">
            <div class="row text-center">

              <div class="col-lg-3 mb-4">
                <div class="cardCreate h-100">
                  <img class="card-img-top" src="clothes/newlook/Suit_-_Jacket_1.png" draggable="true" ondragstart="drag(event)" alt="Jacket_2" padding="center">
                </div>
              </div>

              <div class="col-lg-3 mb-4">
                <div class="cardCreate h-100">
                  <img class="card-img-top" src="clothes/newlook/Shirt_1.png" draggable="true" ondragstart="drag(event)" alt="Shirt_1">
                </div>
              </div>

              <div class="col-lg-3 mb-4">
                <div class="cardCreate h-100">
                  <img class="card-img-top" src="clothes/newlook/Jeans_1.png" draggable="true" ondragstart="drag(event)" alt="Jeans_1">
                </div>
              </div>

              <div class="col-lg-3 mb-4">
                <div class="cardCreate h-100">
                  <img class="card-img-top" src="clothes/newlook/Trousers_2.png" draggable="true" ondragstart="drag(event)" alt="pale-blue-long-sleeve-denim-shirt">
                </div>
              </div>

              <div class="col-lg-3 mb-4">
                <div class="cardCreate h-100">
                  <img class="card-img-top" src="clothes/newlook/Dress_2.png" draggable="true" ondragstart="drag(event)" alt="pale-blue-long-sleeve-denim-shirt">
                </div>
              </div>

              <div class="col-lg-3 mb-4">
                <div class="cardCreate h-100">
                  <img class="card-img-top" src="clothes/h&m/Jacket_2.png" draggable="true" ondragstart="drag(event)" alt="pale-blue-long-sleeve-denim-shirt">
                </div>
              </div>

              <div class="col-lg-3 mb-4">
                <div class="cardCreate h-100">
                  <img class="card-img-top" src="pale-blue-long-sleeve-denim-shirt-.jpg" draggable="true" ondragstart="drag(event)" alt="pale-blue-long-sleeve-denim-shirt">
                </div>
              </div>

              <div class="col-lg-3 mb-4">
                <div class="cardCreate h-100">
                  <img class="card-img-top" src="pale-blue-long-sleeve-denim-shirt-.jpg" draggable="true" ondragstart="drag(event)" alt="pale-blue-long-sleeve-denim-shirt">
                </div>
              </div>

              <div class="col-lg-3 mb-4">
                <div class="cardCreate h-100">
                  <img class="card-img-top" src="pale-blue-long-sleeve-denim-shirt-.jpg" draggable="true" ondragstart="drag(event)" alt="pale-blue-long-sleeve-denim-shirt">
                </div>
              </div>

              <div class="col-lg-3 mb-4">
                <div class="cardCreate h-100">
                  <img class="card-img-top" src="pale-blue-long-sleeve-denim-shirt-.jpg" draggable="true" ondragstart="drag(event)" alt="pale-blue-long-sleeve-denim-shirt">
                </div>
              </div>

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
                <li class="foot-menu-item mbr-fonts-style display-7"><a  href = "Termandconditions.html">Terms &amp; Conditions</a></li>
                <li class="foot-menu-item mbr-fonts-style display-7">Contact Us</li>
              </ul>
            </div>
            <div class="row social-row">
              <div class="social-list align-right pb-2">

                <div class="soc-item">
                  <a href="https://gitlab.cs.man.ac.uk/n81233sa/Project.git" target="_blank">
                    <span class="mbr-iconfont mbr-iconfont-social mbri-opened-folder" style="color: rgb(244, 133, 114); fill: rgb(244, 133, 114);"></span>
                  </a>
                </div>
                <div class="soc-item">
                  <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                    <span class="mbr-iconfont mbr-iconfont-social mbrib-shopping-bag" style="color: rgb(244, 133, 114); fill: rgb(244, 133, 114);"></span>
                  </a>
                </div>
              </div>
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