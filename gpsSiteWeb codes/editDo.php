<?php
session_start();
include('connection.php');

if (isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['Npass']) && isset($_POST['Nuser'])) {
  $username = $_POST['user'];
  $password = $_POST['pass'];
  $New_username = $_POST['Nuser'];
  $New_password = $_POST['Npass'];

  $sql = "SELECT * FROM log WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $count = mysqli_num_rows($result);

  if ($count == 1) {
    $sql = "UPDATE log SET username='$New_username', password='$New_password'";
    $re = mysqli_query($conn, $sql);
    if (mysqli_affected_rows($conn) > 0) {
      $msg = "Username and password changed successfully.";
      header("Location: edit.php?msg=".urlencode($msg))  ;
     
    } else {
      $error = "Failed to change username and password.";
      header("Location: edit.php?error=" .urlencode( $error));
  
    }
  } else {
    $error1 = "Invalid username or password.";
    header("Location: edit.php?error=" . urlencode($error1));
   
  }
}
?>
