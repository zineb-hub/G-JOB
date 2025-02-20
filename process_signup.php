<?php

if (empty($_POST["fname"])) {
    die("Name is required");
}
if (empty($_POST["lname"])) {
    die("Name is required");
}

if ( ! filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required , enter a valid format please");
}

if (strlen($_POST["pword"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["pword"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["pword"])) {
    die("Password must contain at least one number");
}

if ($_POST["pword"] !== $_POST["pwordc"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["pword"], PASSWORD_DEFAULT);

$mysqli = require __DIR__."/database.php";

$sql = "INSERT INTO users (first_name_usr , last_name_usr, email_usr, hash_password)
        VALUES (?, ?, ? ,?)"; 
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss",
                  $_POST["fname"],
                  $_POST["lname"],
                  $_POST["mail"],
                  $password_hash);
                  
if ($stmt->execute()) {

    header("Location: signup-success.php");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken , try again ");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}