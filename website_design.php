



<?php

if (isset($_POST['submit'])){
    
  $useremail = htmlspecialchars($_POST['email']);
  include ("database_2.php");

  $stmt = $conn -> prepare ("SELECT * FROM users WHERE email_usr = ? ");
  $stmt->bind_param("s", $useremail );
  $stmt->execute();
  $result = $stmt -> get_result();
  $user = $result-> fetch_assoc();
  $count = $result -> num_rows ;
 
  if ($count == 1) {
        $user_id = $user['id_user'];
        $sql = "UPDATE users SET is_admin = 1 WHERE id_user = ?";
        $update_stmt = $conn->prepare($sql);
        $update_stmt->bind_param("i", $user_id);
        $update_stmt->execute();

        // Redirect to adminDash.php
        header("Location: adminDash.php");
  }
  else{
    header("Location: after_changes.php");
  }
  }
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      background-color: #f4f4f4;
      font-family: 'Arial', sans-serif;
    }

    .form-container {
      text-align: center;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }

    p {
      font-size: 18px;
      color: #333;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 10px;
      color: #555;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      padding: 12px 20px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background-color: #45a049;
    } 
  </style>
  <title>Logo and Picture Change</title>
</head>
<body>

  <div class="form-container">
    <p>You are going to add a new admin to the website , so be sure the information is true.</p>
    <form action="website_design.php" method="post" enctype="multipart/form-data">
      <label for="newLogo">the email of the new admin : </label>
      <input type="text" id="newLogo" name="email" value="" required>

      
      
      <input type="submit" name ="submit" value ="submit" >
    </form>
  </div>

</body>
</html>