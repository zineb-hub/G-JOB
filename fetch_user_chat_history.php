<?php

// fetch_user_chat_history.php

include('database_connection.php');

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$to_user_id = htmlspecialchars($_POST['to_user_id'], ENT_QUOTES, 'UTF-8');
echo fetch_user_chat_history($_SESSION['user_id'], $to_user_id, $connect);

?>
