<?php

$host = "localhost";
$dbname = "gjobs";
$username = "root";
$password = "";

@$cnx = new mysqli(
    hostname: $host,
    username: $username,
    password: $password,
    database: $dbname
);

if ($cnx->connect_errno) {
    die("Connection error: " . $cnx->connect_error);
}

return $cnx;