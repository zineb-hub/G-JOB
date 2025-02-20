<?php
session_start();
include ("database_connection2.php");
$userID = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
    $fullName = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $phoneNumber = isset($_POST['phone-number']) ? htmlspecialchars($_POST['phone-number']) : '';
    $Email = isset($_POST['p-mail']) ? htmlspecialchars($_POST['p-mail']) : '';
    $workDomain = isset($_POST['domaine']) ? htmlspecialchars($_POST['domaine']) : '';
    $companyName = isset($_POST['company-name']) ? htmlspecialchars($_POST['company-name']) : '';
    $companyLocation = isset($_POST['location']) ? htmlspecialchars($_POST['location']) : '';
    $moreDetails = isset($_POST['more01']) ? htmlspecialchars($_POST['more01']) : '';
    $jobPosition = isset($_POST['position']) ? htmlspecialchars($_POST['position']) : '';
    $jobSalary = isset($_POST['salary']) ? htmlspecialchars($_POST['salary']) : '';
    $jobRequirements = isset($_POST['requirements']) ? htmlspecialchars($_POST['requirements']) : '';
    $jobSpecifications = isset($_POST['more02']) ? htmlspecialchars($_POST['more02']) : '';
    $providerEmail = isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '';
    $providerInsta = isset($_POST['insta']) ? htmlspecialchars($_POST['insta']) : '';
    $providerFB = isset($_POST['facebook']) ? htmlspecialchars($_POST['facebook']) : '';
    $providerLI = isset($_POST['linkedIn']) ? htmlspecialchars($_POST['linkedIn']) : '';
    
    

    $query = "INSERT INTO post_prov (funame_prov, phone_number, email_prov, domain_post, company_name, company_location, company_info, job_position, f_salary, job_requirements, job_spec, email_add, prov_insta, prov_fb, prov_linkedin,userID_prov) 
            VALUES ('$fullName', '$phoneNumber', '$Email', '$workDomain', '$companyName', '$companyLocation', '$moreDetails', '$jobPosition', '$jobSalary', '$jobRequirements', '$jobSpecifications', '$providerEmail', '$providerInsta', '$providerFB', '$providerLI', '$userID')";

    $result = mysqli_query($connect, $query);

    if ($result) {
        echo "<script>alert('Posted successfully, thank you!')</script>";
        header("Location:index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
