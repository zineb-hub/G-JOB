<?php
$mysqli = require "database.php";


$sql = "SELECT AVG(sender_rating) AS averageRating FROM contact_us";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("Error: " . $stmt->error);
    exit;
}

$stmt->execute();
$stmt->bind_result($averageRating);

// Fetch the result
$stmt->fetch();

echo  $averageRating;

if($averageRating==0) echo "no rating yet!";

$stmt->close();
$mysqli->close();
?>
