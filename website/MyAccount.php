<html>
<head>
</head>
<body>
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

  $uID = $_SESSION['uID'];
	//SQL query to return all links in descending order
	$userQuery = mysqli_prepare($connection,"SELECT ClothesID
						 	                             FROM USERS_CLOTHES
						 							                 WHERE UserID = ?;");

	mysqli_stmt_bind_param($userQuery, "i", $uID);
	mysqli_stmt_execute($userQuery);
	mysqli_stmt_bind_result($userQuery, $userName);
	$clothesIds = mysqli_fetch_assoc($result);

	$clothesQuery = mysqli_prepare($connection,"SELECT StorageLink
						 	                                FROM CLOTHES
						 							                    WHERE ClothesID = ?;");

	mysqli_stmt_bind_param($clothesQuery, "i", $cID);
	mysqli_stmt_execute($userQuery);
	mysqli_stmt_bind_result($userQuery, $userName);
	#class ClothesClass{
	#	public $StorageLink = "";
	#	public $ShopLink= "";
	#	public $Name = "";
	#}
  $clothesLinks = array();

	foreach ($clothesIds as $cID) {
		mysqli_stmt_execute($clothesQuery);
		mysqli_stmt_bind_result($clothesQuery, $clothesLink);
		$clothesLinks[] = $clothesLink;
	}

	mysqli_close($connection);
?>
<div class="col-lg-3 col-md-6 mb-4">
            <div class="cardshadow h-100">
              <img id="testImg" class="card-img-top" src="clothes/h&m/Shirt_1.png" alt="">
              <div class="card-footer">
                <a href="#" class="btn btn-primary">Find Out More!</a>
              </div>
            </div>
          </div>
<script>
	var obj =<?php echo json_encode($clothesLinks) ?>;
	document.write(obj[0]['StorageLink']);

	var body = document.getElementById("body");
	var div = document.createElement("div");
	div.className = "col-lg-3 col-md-6 mb-4";

	function imageCreate(){
		var image = new Image();
		image.src = obj[0]['StorageLink'];
		image.className = "card-img-top" ;
		return image;
	}
	var test = "clothes/h&m/Shirt_2.png";
	document.getElementById("testImg").src = test;
	//for array length
	//create html with unique id and pic associated with
</script>
</body>

</html>
