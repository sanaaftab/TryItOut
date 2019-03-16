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
	$sqlquery = "SELECT StorageLink, UserId
				       FROM OUTFITS
				       ORDER BY Score DESC;"

	$result = mysqli_query($connection,$sqlquery) or die(mysqli_error($connection))

	$userQuery = mysqli_prepare($connection,"SELECT Username
						 	                             FROM USERS
						 							                 WHERE userId = ?;")

	$outfitList = array();

	mysqli_stmt_bind_param($userQuery, "i", $userId);

	if(mysqli_num_rows($result) > 0)
	{
		//save image links in array
		while($row = mysqli_fetch_assoc($result))
		{
			$userId = $row['UserId'];
			mysqli_stmt_execute($userQuery);
			$outfitsList[] = array("UserName" => mysql_fetch_row($userQuery);, "StorageLink" => $row['StorageLink']);
		}
	}
	else echo "Does not exist" ;

	mysqli_close($connection);
?>
<script>
	var obj =<?php echo json_encode($outfitsList) ?>;
	document.write(obj[0]['UserName']);

</script>
</body>

</html>
