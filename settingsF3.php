<?php
include_once("database_connection2.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["old_pw"]))
        echo "current password not entered!";
    else if (!isset($_POST["new_pw"]))
        echo "new password not set!";
    else if (!isset($_POST["pw_confirmation"]))
        echo "password confirmation not set!";
    else {
        session_start();
        $userID = $_SESSION["user_id"];
        $oldpw = htmlspecialchars($_POST["old_pw"]);
        $newpw = htmlspecialchars($_POST["new_pw"]);
        require_once("db.php");
        $query = "SELECT * FROM users WHERE id_user = ? ";
        $stmt = $connect->prepare($query);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        if (password_verify($oldpw, $user['hash_password'])) {
            $userpw = password_hash($newpw, PASSWORD_DEFAULT);
            $query2 = "UPDATE users SET hash_password = ? WHERE id_user=?";
            $stmt2 = $connect->prepare($query2);
            $stmt2->bind_param("si", $userpw, $userID);
            $stmt2->execute();
            echo "<script>
            window.location.href = 'settings.php'
            alert('changes saved!')</script>";

        } else {
            echo "<script>
            window.location.href = 'settings.php'
            alert('Incorrect Password')</script>";
        }
        if ($stmt->error) {
            echo "Error: " . $stmt->error . "<br>";
        }
    }

} else {
    header("Location: settings.php");
}
?>