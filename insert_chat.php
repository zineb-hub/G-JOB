<?php

//insert_chat.php

include('database_connection.php');

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$data = array(
    htmlspecialchars($_POST['to_user_id'], ENT_QUOTES, 'UTF-8'),
    $_SESSION['user_id'],
    htmlspecialchars($_POST['chat_message_content'] ?? '', ENT_QUOTES, 'UTF-8'),
    '1'
);

$query = "
INSERT INTO chat_message 
(to_user_id, from_user_id, chat_message_content, message_read_status) 
VALUES (?, ?, ?, ?)
";

$statement = $connect->prepare($query);

// Bind parameters
$statement->bind_param('iiss', $data[0], $data[1], $data[2], $data[3]);

if ($statement->execute()) {
    echo fetch_user_chat_history($_SESSION['user_id'], htmlspecialchars($_POST['to_user_id'], ENT_QUOTES, 'UTF-8'), $connect);
}


?>
