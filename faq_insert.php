<?php


if(!empty($test)){
die("enter proper values , text can not be empty  ");
exit;
}

$mysqli = require "database.php";

$sql = "INSERT INTO testimonials (content_message)
        VALUES (?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

// Sanitize input to prevent SQL injection
$name = htmlspecialchars($_POST["content"]);

$stmt->bind_param("s", $name);

if ($stmt->execute()) {
   // echo "<script>alert('your message wes recieved thank you for your time . !');</script>";
    header("Location:home.php");
    exit;

} else {
    die("Execution failed: " . $stmt->error . " - " . mysqli_error($mysqli));
}



?>