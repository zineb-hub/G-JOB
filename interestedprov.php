<?php
session_start();
include ("database_2.php");
$userID = $_SESSION['user_id'];
if (isset($_COOKIE['postId'])) {
    $postID = intval($_COOKIE['postId']);
}

if(isset($_POST['storeValue'])) {
    $sql = "INSERT INTO interested_post_prov (userID,postID) values (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii",$userID,$postID);
    $stmt->execute();

    if($stmt) {
        header("Location: provpost.php"); 
    }
}
?>