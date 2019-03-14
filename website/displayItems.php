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

	//SQL query to return all links in descending order
	$sqlquery = "SELECT Name, ShopLink, StorageLink
				FROM CLOTHES			
			    ORDER BY ClothesID DESC";
				
	$result = mysqli_query($connection,$sqlquery)or die(mysqli_error($connection));
	
	class ClothesClass{
		public $StorageLink = "";
		public $ShopLink= "";
		public $Name = "";
	}
	
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
<script>
	var obj =<?php echo json_encode($clothesList) ?>;
	document.write(obj[0]['ShopLink']);
	
	
</script>
</body>

</html>
