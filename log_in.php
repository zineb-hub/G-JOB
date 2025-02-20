<?php
// echo "nesrine";
// // $is_invalid = false;
// if(isset($_POST['submit']))
//  {
    
//     $mysqli = require "database.php";
//     $email = $_POST["email"];
//     $sql = "SELECT * FROM users WHERE email_user = ?";
   
//     $stmt = $mysqli->prepare($sql);
    
//     // Bind the parameter
//     $stmt->bind_param("s", $_POST["email"]);
    
//     // Execute the query
//     $stmt->execute();
    
//     // Get the result
//     $result = $stmt->get_result();
    
//     // Fetch the user data
//     $user = $result->fetch_assoc();
//     echo "info fetched ";
//     if(!isset($user))
//     {
//         die("empty user list ");
//     }
//     // Check if the user exists and the password is correct
//     if ($user && password_verify($_POST["password"], $user["hash_password"])) {
        
        
//         // Start a new session
//         session_start();
        
//         // Regenerate session ID to prevent session fixation attacks
//         session_regenerate_id();
        
//         // Store user ID in the session
//         $_SESSION["user_id"] = $user["id_user"];

//         // Redirect to the desired page after successful login
//         header("Location: index.php");
//         exit;
//     } else {
//         echo "invalide ";
//         // Invalid email or password
//         // $is_invalid = true;
//     }
// }
// else {
// // Redirect to error page with the error type
// header("Location: error.php?type=" . urlencode($error_type));
// exit;
// }


include ("database_connection2.php");
if (isset($_POST['submit'])){
    session_start();
    $useremail = htmlspecialchars($_POST['email']);
    $userpassword = htmlspecialchars($_POST['password']);
    $hachedpassword = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

    $stmt = $connect -> prepare ("SELECT * FROM users WHERE email_usr = ? ");
    $stmt->bind_param("s", $useremail );
    $stmt->execute();
    $result = $stmt -> get_result();
    $user = $result-> fetch_assoc();
    $count = $result -> num_rows ;
   
    if ($count == 1) {
        
        if (password_verify($userpassword, $user['hash_password'])) {
            $_SESSION['user_id'] = $user['id_user'];

            $sub_query = "INSERT INTO login_details (user_id) VALUES (?)";
            $stmt_insert_login = $connect->prepare($sub_query);
            $stmt_insert_login->bind_param("i", $_SESSION['user_id']);
            $stmt_insert_login->execute();
            $_SESSION['login_details_id'] = $stmt_insert_login->insert_id;


            if($user['is_admin'] == '1'){
                $_SESSION['admin'] = '1' ;
            }
            else {
                $_SESSION['admin'] = '0';
            }
            header("Location: index.php");
        } else {
            echo "<script>alert('Incorrect password')</script>";
        }
    } else {
         echo "<script>alert('No user found , try again ')</script>";
    }
}
?>


<!DOCTYPE html>

<html lang="en">


<head>
    <link rel="icon" href="rosey/img/WITH-BG/1.png" />
    <meta charset="UTF-8">
    <link href="nesrine/log_in.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
		rel="stylesheet"
	/>
    <title>G-JOB</title>

</head>
<body>
    <div class="loginform">
        <div class="imgcontainer">
            <img id="img-login" src="files/default.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="form">
            <form action="log_in.php" method="POST">
                <input class="inputs" name="email" placeholder="Enter your email" type="email" id="email" required>
                <input class="inputs" name="password" placeholder="Enter your password" id='password' type="password" maxlength="16" minlength="8" required>
                <br>
                <!-- <label for="remember_me" id="remember_me"><input type="checkbox" name="remember_me"> remember me</label>
                <br> -->
                <input  type="submit" name="submit" id="submit"  value="Submit">
            </form>
        </div>
    </div>
</body>

<!-- <script src="login.js">

</script> -->

<style>
    * {
        color: black;
    }
</style>

</html>