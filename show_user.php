<?php

$users = [];
$mysqli = require "database.php";

if ($mysqli->connect_error) {
    die("connection error : " . $mysqli->connect_error);
}

$sql = "SELECT * FROM users";
$result = $mysqli->query($sql);

$contacts = [];

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
       
        $users[] = [
            'picture' => $row['profile_pic_user'],
            'first_name_usr' => $row['first_name_usr'],
            'last_name_usr' => $row['last_name_usr'],
            'email' => $row['email_usr'],
        ];
    }
} else {
    
    echo "There are no users yet in the database, thank you.";
}

$mysqli->close();

// htmlspecialchars($user['picture']) .

foreach ($users as $user) {
    
    echo ' 
    <div class="one-question">
        <div class="question-div">
          
          <h1 style="font-size:20px;">'. htmlspecialchars($user['first_name_usr'])
          . '  ' . htmlspecialchars($user['last_name_usr'])  .'</h1>'.
             '<h4  >'.htmlspecialchars($user['email']) .'</h4>
        </div>
        <div class="buttons">
        <div>
            <button class="answer"><a style="color: white; text-decoration : none"  href="mailto:' .$user['email'] .' " ">Email</a>
            </button>
        </div>
        <form action="delete_user.php" method="post">
            <input type="hidden" name="id" value="' .$user['email'] . '">
            <input type="submit" name="delete_user" class="delete-question1"  value="Delete">
        </form>
    </div>
</div>';

}
