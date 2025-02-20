<?php
session_start();

if (isset($_POST['Type'])) {
    $sanitizedType = htmlspecialchars($_POST['Type'], ENT_QUOTES, 'UTF-8');
    $_SESSION['Type'] = $sanitizedType;
    echo 'Type set successfully';
} else {
    echo 'Type not provided';
}

?>

