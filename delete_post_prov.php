
<?php

$mysqli = require "database.php" ;

if ($mysqli->connect_error) {
    die("connection error : " . $mysqli->connect_error);
}

$x =htmlspecialchars($_POST["id"]) ;

$sql = "DELETE  FROM  post_prov WHERE email_prov = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $x);
$stmt->execute();
$stmt->close();

include ("adminDash.php");
?>

