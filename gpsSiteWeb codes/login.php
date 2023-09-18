<?php
session_start();
include('connection.php');

if (isset($_POST['submit'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM log WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if (!$stmt) {
        die('Error: ' . mysqli_error($conn));
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['logged_in'] = true;
        header("Location: home.php");
        exit();
    } else {
        $msg = "Login failed. Invalid username or password!!";
        header("Location: index.php?msg=" . urlencode($msg));
        exit();
    }
}
?>
