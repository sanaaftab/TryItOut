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
		
		let a = document.createElement("a");
		a.className = "btn btn-primary";
		a.href = "#";
		a.innerHTML = "Add to Favourites";
		
		
		fragment.appendChild(div1);
		div1.appendChild(div2);
		div2.appendChild(image);
		div2.appendChild(div3);
		div3.appendChild(a);
		ye.appendChild(fragment);
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
</body>

</html>
