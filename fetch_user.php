<?php
// fetch_user.php

include('database_connection.php');
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$userId = $_SESSION['user_id'] ?? null;

if ($userId) {
    $query = "
    SELECT u.id_user, u.last_name_usr, u.first_name_usr
    FROM (
       SELECT *
       FROM friendship
       WHERE party1__id = ? OR party2_id = ?
    ) AS f
    JOIN users AS u ON 
       (f.party1__id != ? AND f.party1__id = u.id_user) OR
       (f.party1__id = ? AND f.party2_id = u.id_user)
 ";
 

    $statement = $connect->prepare($query);
    $statement->bind_param('iiii', $userId, $userId, $userId, $userId);
    $statement->execute();

    $result = $statement->get_result();
    
    $output = '
        <table class="table table-bordered table-striped">
            <tr>
                <td>Username</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
    ';

    while ($row = $result->fetch_assoc()) {
        $status = '';
        $currentTimestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
        $currentTimestamp = date('Y-m-d H:i:s', $currentTimestamp);
        $userLastActivity = fetch_user_last_activity($row['id_user'], $connect);

        if ($userLastActivity > $currentTimestamp) {
            $status = '<span class="label label-success">Online</span>';
        } else {
            $status = '<span class="label label-danger">Offline</span>';
        }

        $output .= '
            <tr>
                <td>'.$row['last_name_usr'].' '.$row['first_name_usr'].'</td>
                <td>'.$status.'</td>
                <td>
                    <button type="button" class="btn btn-info btn-xs start_chat"
                        data-touserid="'.$row['id_user'].'"
                        data-tousername="'.$row['last_name_usr'].' '.$row['first_name_usr'].'">Start Chat
                    </button>
                </td>
            </tr>
        ';
    }

    $output .= '</table>';
    
    echo $output;
} else {
    // Handle the case where the user is not logged in
    echo "User not logged in.";
}
?>
