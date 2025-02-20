<?php
session_start();
include_once("database_connection2.php");
$I_D = $_SESSION["user_id"];
$Q = "SELECT profile_pic_user FROM users WHERE users.id_user=?";
$ST = $connect->prepare($Q);
$ST->bind_param('i', $I_D);
$ST->execute();
if ($ST->error) {
    echo "Error: " . $ST->error . "<br>";
}
$result = $ST->get_result();
$user = $result->fetch_object();
$prof_pic = ($user->profile_pic_user);

echo $prof_pic;
?>