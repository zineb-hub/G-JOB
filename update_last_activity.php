<?php

// update_last_activity.php

include('database_connection.php');

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$query = "
    UPDATE login_details 
    SET last_activity = NOW() 
    WHERE login_details_id = ?
";

$statement = $connect->prepare($query);

// Bind parameters
$statement->bind_param('i', $_SESSION["login_details_id"]); // 'i' represents integer type

$statement->execute();

?>
