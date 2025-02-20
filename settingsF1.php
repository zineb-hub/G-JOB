<?php
include_once("database_connection2.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["first_name"]))
        echo "first name not set!";
    else if (!isset($_POST["last_name"]))
        echo "last name not set!";
    else if (!isset($_POST["email"]))
        echo "Email not set!";
    else {
        session_start();
        $userID = $_SESSION["user_id"];
        $firstname = htmlspecialchars($_POST["first_name"]);
        $lastname = htmlspecialchars($_POST["last_name"]);
        $email = htmlspecialchars($_POST["email"]);
        require_once("db.php");
        $query = "UPDATE users SET first_name_usr = ? , last_name_usr = ?, email_usr = ? WHERE id_user=?";
        $stmt = $connect->prepare($query);
        $stmt->bind_param("sssi", $firstname, $lastname, $email, $userID);
        $stmt->execute();
        if ($stmt->execute()) {
            header("Location: settings.php");
        } elseif ($stmt->errno === 1062) {
            die("Email already taken, try again");
        } else {
            echo "Error: " . $stmt->error . "<br>";
        }

    }

} else {
    header("Location: settings.php");
}
?>