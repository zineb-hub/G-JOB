<?php

$host = "localhost";
$dbname = "gjobs";
$username = "root";
$password = "";

$conn = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($conn->connect_errno) {
    die("Connection error: " . $conn->connect_error);
}


// return $mysqli;