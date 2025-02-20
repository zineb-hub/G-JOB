<?php
$mysqli = require "database.php";

// Assuming your table name is "users"
$sql = "SELECT COUNT(*) AS rowCount FROM post_prov , post_seekers";
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
