<?php
session_start();
include ("database_connection2.php");
$userID = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
    $fullName = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $phoneNumber = isset($_POST['phone-number']) ? htmlspecialchars($_POST['phone-number']) : '';
    $Email = isset($_POST['p-mail']) ? htmlspecialchars($_POST['p-mail']) : '';
    $workDomain = isset($_POST['domaine']) ? htmlspecialchars($_POST['domaine']) : '';
    $schoolName = isset($_POST['school']) ? htmlspecialchars($_POST['school']) : '';
    $degreeObt = isset($_POST['degree']) ? htmlspecialchars($_POST['degree']) : '';
    $pastExperience = isset($_POST['experience']) ? htmlspecialchars($_POST['experience']) : '';
    $jobPosition = isset($_POST['position']) ? htmlspecialchars($_POST['position']) : '';
    $jobSalary = isset($_POST['salary-wanted']) ? htmlspecialchars($_POST['salary-wanted']) : '';
    $startDate = isset($_POST['start-date']) ? htmlspecialchars($_POST['start-date']) : '';
    $jobSpecifications = isset($_POST['more03']) ? htmlspecialchars($_POST['more03']) : '';
    $seekDoc = isset($_POST['files']) ? htmlspecialchars($_POST['files']) : '';
    $seekerInsta = isset($_POST['insta']) ? htmlspecialchars($_POST['insta']) : '';
    $seekerFB = isset($_POST['facebook']) ? htmlspecialchars($_POST['facebook']) : '';
    $seekerLI = isset($_POST['linkedIn']) ? htmlspecialchars($_POST['linkedIn']) : '';
    $type = "seeker";
    

    $query = "INSERT INTO post_seekers (funame_seek, phone_number, email_seek, domain_post, school_seeker, degree_seeker,job_position, salary_job, job_spec,file_seeker, start_date_seeker, seek_insta, seek_fb,seek_linkedin, seek_experience, userID_seek,post_type) 
            VALUES ('$fullName', '$phoneNumber', '$Email', '$workDomain', '$schoolName', '$degreeObt','$jobPosition', '$jobSalary','$jobSpecifications', '$seekDoc', '$startDate', '$seekerInsta','$seekerFB','$seekerLI', '$pastExperience' , '$userID' , '$type')";

    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "<script>alert('Posted successfully, thank you!')</script>";
        header("Location:index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($connect);
    }
    mysqli_close($connect);
}

?>

