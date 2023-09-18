<?php 
if (!defined('DB_HOST')) {
    define('DB_HOST', 'localhost');
}
if (!defined('DB_USERNAME')) {
    define('DB_USERNAME', 'id20742031_root');
}
if (!defined('DB_PASSWORD')) {
    define('DB_PASSWORD', 'DataBase123456789@');
}
if (!defined('DB_NAME')) {
    define('DB_NAME', 'id20742031_root_db');
}
date_default_timezone_set('Africa/Casablanca');
// Connect with the database 
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME); 
// Display error if failed to connect 
if ($conn->connect_errno) { 
    echo "Connection to database is failed: ".$conn->connect_error;
    exit();
} ?>