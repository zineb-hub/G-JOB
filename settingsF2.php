<?php
include_once("database_connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $userID = $_SESSION["user_id"];
    require_once("db.php");
    $query = "DELETE FROM users WHERE id_user = ?;";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    if ($stmt->error) {
        echo "Error: " . $stmt->error . "<br>";
    } else {
        session_abort();
        header("Location: home.php");
    }

} else {
    header("Location: settings.php");
}
?>