<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbDatabase = "steptember";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbDatabase);

if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

//echo "Connected";