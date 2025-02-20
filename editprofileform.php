<?php
require_once("database_connection.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $filepath = "files/";
    $userID = $_SESSION["user_id"];
    if (!empty($_FILES["pfp_up"]["tmp_name"])) {
        move_uploaded_file($_FILES["pfp_up"]["tmp_name"], "files/" . $_FILES['pfp_up']['name']);
        $pfp = "files/" . $_FILES['pfp_up']['name'];
        $pfpquery = "UPDATE users SET profile_pic_user = ? where id_user = ?";
        $pfpstmt = $connect->prepare($pfpquery);
        $pfpstmt->bind_param("si", $pfp, $userID);
        $pfpstmt->execute();
    } else if (!empty(trim($_POST['pfpdel']))) {
        $pfp = "files/default.jpg";
        $pfpquery = "UPDATE users SET profile_pic_user = ? where id_user = ?";
        $pfpstmt = $connect->prepare($pfpquery);
        $pfpstmt->bind_param("si", $pfp, $userID);
        $pfpstmt->execute();
    }
    if (!empty($_FILES["cvup"]["tmp_name"])) {
        move_uploaded_file($_FILES["cvup"]["tmp_name"], "files/" . $_FILES['cvup']['name']);
        $cv = "files/" . $_FILES['cvup']['name'];
        $cvquery = "UPDATE users SET cv_file = ? where id_user = ?";
        $cvstmt = $connect->prepare($cvquery);
        $cvstmt->bind_param("si", $cv, $userID);
        $cvstmt->execute();
    } else if (!empty(trim($_POST['cvdel']))) {
        $cv = null;
        $cvquery = "UPDATE users SET cv_file = ? where id_user = ?";
        $cvstmt = $connect->prepare($cvquery);
        $cvstmt->bind_param("si", $cv, $userID);
        $cvstmt->execute();
    }
    $city = ($_POST["city"]);
    $skills = ($_POST["skills"]);
    $edu = ($_POST["degrees"]);
    $exp = ($_POST["exp"]);
    $address = ($_POST["address"]);
    $bd = $_POST["dateofbirth"];
    $bio = ($_POST["description"]);
    $gender = ($_POST["gender"]);
    $query1 = "INSERT INTO languages (id_user, language_text) VALUES (?, ?)";
    $stmt1 = $connect->prepare($query1);
    foreach ($_POST["langselect"] as $value) {
        $stmt1->bind_param("is", $userID, $value);
        if ($stmt1->execute()) {
            // Success
        } else {
            echo "Error inserting language: " . $stmt1->error . "<br>";
        }
    }
    // $query_existing_languages = "SELECT language_text FROM languages WHERE id_user = ?";
    // $stmt_existing_languages = $connect->prepare($query_existing_languages);
    // $stmt_existing_languages->bind_param("i", $userID);
    // $stmt_existing_languages->execute();
    // $stmt_existing_languages->bind_result($existing_language);

    // $existing_languages = array();
    // while ($stmt_existing_languages->fetch()) {
    //     $existing_languages[] = $existing_language;
    // }

    // $stmt_existing_languages->close();

    // // Process the submitted languages
    // foreach ($_POST["langselect"] as $selected_language) {
    //     // Check if the language is already associated with the user
    //     if (in_array($selected_language, $existing_languages)) {
    //         // Language already exists, skip insertion
    //         continue;
    //     }

    //     // Insert the new language
    //     $query_insert_language = "INSERT INTO languages (id_user, language_text) VALUES (?, ?)";
    //     $stmt_insert_language = $connect->prepare($query_insert_language);
    //     $stmt_insert_language->bind_param("is", $userID, $selected_language);

    //     if ($stmt_insert_language->execute()) {
    //         // Success
    //     } else {
    //         echo "Error inserting language: " . $stmt_insert_language->error . "<br>";
    //     }
    //     $stmt_insert_language->close();
    // }

    // // Remove unselected languages
    // $languages_to_remove = array_diff($existing_languages, $_POST["langselect"]);
    // if (!empty($languages_to_remove)) {
    //     $query_remove_languages = "DELETE FROM languages WHERE id_user = ? AND language_text IN (" . implode(",", array_fill(0, count($languages_to_remove), "?")) . ")";
    //     $stmt_remove_languages = $connect->prepare($query_remove_languages);

    //     $stmt_remove_languages->bind_param(str_repeat("is", count($languages_to_remove) + 1), $userID, ...$languages_to_remove);

    //     if ($stmt_remove_languages->execute()) {
    //         // Success
    //     } else {
    //         echo "Error removing languages: " . $stmt_remove_languages->error . "<br>";
    //     }
    //     $stmt_remove_languages->close();
    // }
    // $stmt1->close();  // Close the statement after the loop
    $query = "UPDATE users SET skills_text =? , experience_text=? , education_text =? , city_usr = ?, address_usr = ?, gender_usr = ?, birthdate_usr = ?, bio_usr= ? WHERE id_user = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("ssssssssi", $skills, $exp, $edu, $city, $address, $gender, $bd, $bio, $userID);

    if ($stmt->execute()) {
        header("Location: profile.php");
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }
} else {
    header("Location: EditProfile.php");
}
