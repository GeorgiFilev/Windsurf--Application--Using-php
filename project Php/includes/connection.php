<?php
$dbservername = "127.0.0.1";
$dbusername = "root";
$dbpassword = "";
$dbname = "social_network";

$con = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
if ($con->connect_error) {
    /* Use your preferred error logging method here */
    error_log('Connection error: ' . $mysqli->connect_error);
}
