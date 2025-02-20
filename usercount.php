<?php
$mysqli = require "database.php";


$sql = "SELECT COUNT(*) AS rowCount FROM users";
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("Error: " . $stmt->error);
    exit;
}

$stmt->execute();
$stmt->bind_result($rowCount);

// Fetch the result
$stmt->fetch();

echo  $rowCount;

$stmt->close();
$mysqli->close();
?>
