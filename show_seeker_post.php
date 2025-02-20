<?php

$users = [];
$mysqli = require "database.php";

if ($mysqli->connect_error) {
    die("connection error : " . $mysqli->connect_error);
}

$sql = "SELECT * FROM post_seekers";
$result = $mysqli->query($sql);

$contacts = [];

if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {
       
        $users[] = [
            
            'domain' => $row['domain_post'],
            'degree_seeker' => $row['job_spec'],
            'email_seek' =>$row['email_seek']
        ];
    }
} else {
    
    echo "There are no posts yet in the database, thank you.";
}

$mysqli->close();

// htmlspecialchars($user['picture']) .

foreach ($users as $user) {
    
    echo ' 
    <div class="post-item">
    <h3>
    '

        . htmlspecialchars($user['domain'])
        . ' </h3>
        <span>' .htmlspecialchars($user['degree_seeker']).
        ' </span>
        <div style="margin-left: 10px;" class="profile-buttons-divs2">
            <form class="profile-buttons-divs3" action="delete_post_seeker.php" method="post">
              <input type="hidden" name="id" value="' .htmlspecialchars($user['email_seek'])  . '">
              <input type="submit" name="delete_user" class="delete-question1"  value="Delete">
            </form>
        
        <div style="margin-bottom: 10px;" class="profile-buttons-divs3">
            <button class="answer1" ><a style="color: black; text-decoration : none" href="mailto:'.htmlspecialchars($user['email_seek']).'" >Email</a></button> 
        </div>
        </div>
        </div>';

    echo "<br>";
}
