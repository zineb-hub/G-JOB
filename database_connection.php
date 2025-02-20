<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gjobs";

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

date_default_timezone_set('Africa/Algiers');


function fetch_user_last_activity($user_id, $connect)
{
    $query = "
        SELECT * FROM login_details 
        WHERE user_id = ? 
        ORDER BY last_activity DESC 
        LIMIT 1
    ";

    $statement = $connect->prepare($query);

    if (!$statement) {
        // Handle the prepare error (e.g., log it)
        return null;
    }

    $statement->bind_param('i', $user_id);

    if (!$statement->execute()) {
        // Handle the execute error (e.g., log it)
        return null;
    }

    $result = $statement->get_result();

    // Fetch the first row from the result set
    $row = $result->fetch_assoc();

    if ($row) {
        return $row['last_activity'];
    }

    return null; // Return null or handle the case when no row is found
}



function fetch_user_chat_history($from_user_id, $to_user_id, $connect)
{
    $query = "
        SELECT * FROM chat_message 
        WHERE (from_user_id = ? AND to_user_id = ?) 
        OR (from_user_id = ? AND to_user_id = ?) 
        ORDER BY message_timestamp DESC
    ";

    $statement = $connect->prepare($query);
    $statement->bind_param('iiii', $from_user_id, $to_user_id, $to_user_id, $from_user_id);
    $statement->execute();


    $output = '<ul class="list-unstyled">';
    $result = $statement->get_result();
    while ($row = $result->fetch_assoc()) {
            $user_name = '';
        if ($row["from_user_id"] == $from_user_id) {
            $user_name = '<b class="text-success">You</b>';
        } else {
            $user_name = '<b class="text-danger">' . get_user_name($row['from_user_id'], $connect) . '</b>';
        }

        $output .= '
            <li style="border-bottom:1px dotted #ccc">
                <p>' . $user_name . ' - ' . $row["chat_message_content"] . '
                    <div align="right">
                        - <small><em>' . $row['message_timestamp'] . '</em></small>
                    </div>
                </p>
            </li>
        ';
    }

    $output .= '</ul>';
    return $output;
}


function get_user_name($user_id, $connect)
{
    $query = "SELECT * FROM users WHERE id_user = ?";
    $statement = $connect->prepare($query);
    $statement->bind_param('i', $user_id);
    $statement->execute();
    $result = $statement->get_result();

    // Fetch the first row from the result set
    $row = $result->fetch_assoc();

    if ($row) {
        // Return the concatenated full name
        return $row['last_name_usr'] . ' ' . $row['first_name_usr'];
    } else {
        // Handle the case when no row is found
        return 'User not found';
    }
}

function setCategorySession($category) {
    echo "<script>
            $.ajax({
                type: 'POST',
                url: 'setCategorySession.php',
                data: { category: '$category' }, // Ensure proper quoting
                success: function(response) {
                    alert(response);
                },
                error: function(error) {
                    console.error(error);
                }
            });
          </script>";
}


?>

<script>
function setTypeSession(type) {
    $.ajax({
        type: 'POST',
        url: 'setTypeSession.php',
        data: { Type: type },
        success: function (response) {
        },
        error: function (error) {
            console.error(error);
        }
    });
    fetch_posts();
}
function fetch_posts() {
    $.ajax({
        url: "user_posts_Type.php",
        method: "POST",
        dataType: "html",
        success: function (data) {
            // Append the received data to the .masonrygrid element
            $('.masonrygrid.row.listrecent').html(data);
        },
        error: function (error) {
            console.error(error);
        }
    });
}
function add_posts()
 {
  $.ajax({
   url:"add_post_type.php",
   method:"POST",
   success:function(data){
    $('.masonrygrid.row.listrecent').append(data);
   }
  })
 }

 function add_featured_posts()
 {
  $.ajax({
   url:"add_featured_posts.php",
   method:"POST",
   success:function(data){
    $('.row.listfeaturedtag').html(data);
   }
  })
 }

 function setUserIdCookie(userId) {
        // Set a cookie with the user ID
        document.cookie = "userId=" + userId + "; path=/";
}
 function setPostIdCookie(postId) {
        // Set a cookie with the user ID
        document.cookie = "postId=" + postId + "; path=/";

}

function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }
</script>