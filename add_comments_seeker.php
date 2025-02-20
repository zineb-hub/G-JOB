<?php
include('database_connection.php');
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Use prepared statement to avoid SQL injection
$sql = "SELECT 
            comments_post_seek.comment_content AS `comment`,
            users.id_user AS `user_id`,
            users.first_name_usr AS `first_name`, 
            users.last_name_usr AS `last_name`, 
            users.profile_pic_user AS `profile_pic`
        FROM comments_post_seek
        INNER JOIN users ON users.id_user = comments_post_seek.id_user
        WHERE comments_post_seek.id_post = ?
        ORDER BY comments_post_seek.timestamp DESC";  // Added ORDER BY clause


$stmt = $connect->prepare($sql);

if ($stmt) {
    // Bind the parameter
    $stmt->bind_param("i", $_SESSION['postId']);

    // Execute the query
    $stmt->execute();

    // Bind the results
    $stmt->bind_result($comment, $user_id, $first_name, $last_name, $profile_pic);

    // Initialize an empty string to accumulate posts
    $output = '';

    // Fetch and print the records
    while ($stmt->fetch()) {
        $comment = isset($comment) ? htmlspecialchars($comment) : '';
        $user_id = isset($user_id) ? htmlspecialchars($user_id) : '';
        $first_name = isset($first_name) ? htmlspecialchars($first_name) : '';
        $last_name = isset($last_name) ? htmlspecialchars($last_name) : '';
        $profile_pic = isset($profile_pic) ? htmlspecialchars($profile_pic) : '';

        $output .= '<div class="one-comment">
            <div class="commenter-info">
                <a href="otherviewprofile.php" onclick="setUserIdCookie('.$user_id.')" style="cursor: pointer;">
                    <img style="width:50px;height: 50px;;border-radius:50%;" class="author-thumb" src='.$profile_pic.' alt="'.$first_name.' '.$last_name.'">
                    <span style="font-weight: bold; color:black;">'.$first_name.' '.$last_name.'</span>
                    </br>
                </a>
            </div>
            <div class="comment-content">
                <span class="comment-text">'.$comment.'</span>
            </div>
        </div>';
    }

    // Close the statement
    $stmt->free_result();
    $connect->close();
    // Output the accumulated HTML posts
    echo $output;
    
    // Close the database connection after using the data
    
} else {
    echo "Error in preparing the SQL statement.";
}
?>
