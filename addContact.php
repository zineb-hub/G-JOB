<?php
include('database_connection.php');
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$response = array('success' => false, 'message' => 'Contact was not added');

if (isset($_POST['firstName'], $_POST['lastName'])) {
    $firstName = htmlspecialchars($_POST['firstName'], ENT_QUOTES, 'UTF-8');
    $lastName = htmlspecialchars($_POST['lastName'], ENT_QUOTES, 'UTF-8');

    // Use prepared statements with MySQLi
    $query = "SELECT id_user FROM users WHERE first_name_usr = ? AND last_name_usr = ? LIMIT 1";
    $statement = $connect->prepare($query);
    $statement->bind_param('ss', $firstName, $lastName);

    if ($statement->execute()) {
        $statement->store_result();
    
        if ($statement->num_rows > 0) {
            $statement->bind_result($id_user);
            $statement->fetch();
    
            // Insert into friendship table
            $party2_id = $_SESSION['user_id'];  // Create a variable for the constant value
            $insertQuery = "INSERT INTO friendship (party1__id, party2_id) VALUES (?, ?)";
            $insertStatement = $connect->prepare($insertQuery);
            $insertStatement->bind_param('ii', $id_user, $party2_id);
    
            if ($insertStatement->execute()) {
                $response['success'] = true;
                $response['message'] = 'Contact added';
            } else {
                // Handle database insert error
                $response['message'] = 'Error adding contact to friendship table: ' . $insertStatement->error . ', ' . $insertStatement->errno;
            }
        } else {
            // Handle user not found
            $response['message'] = 'User not found';
        }
    } else {
        // Handle database query error
        $response['message'] = 'Error executing query: ' . $statement->error . ', ' . $statement->errno;
    }
    
}

echo json_encode($response);
?>
