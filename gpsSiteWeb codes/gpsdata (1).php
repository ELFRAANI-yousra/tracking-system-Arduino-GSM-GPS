<?php 

require 'connection.php';

$lat = $_GET['lat'];
$lng = $_GET['lng'];

echo $lat;
echo "<br>";
echo $lng;


$sql = "INSERT INTO tbl_gps(lat,lng,created_date) 
	VALUES('".$lat."','".$lng."','".date("Y-m-d H:i:s")."')";
	
	

	
	

if($conn->query($sql) === FALSE)
	{ echo "Error: " . $sql . "<br>" . $conn->error; }

echo "<br>";
echo $conn->insert_id;