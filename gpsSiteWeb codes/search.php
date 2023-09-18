<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: index.php');
    exit();
}
require 'connection.php';
$date= $_POST['date'];
$time=$_POST['time'];
$formattedTime = date("H:i", strtotime($time));
$date_and_time=$date." ".$time;
$sql = "SELECT * FROM tbl_gps ORDER BY ABS(TIMESTAMPDIFF(MINUTE, created_date, '$date_and_time')) LIMIT 1;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $closestDate = $row['created_date'];
    $lat=$row['lat'];
    $lon=$row['lng'];
    //Redirect to another page and pass the closest date as a parameter
    
    header("Location: home.php?date=" . urlencode($closestDate)."&lat=".urlencode($lat)."&lon=".urlencode($lon));
} else {
    echo "No results found.";
}

?>