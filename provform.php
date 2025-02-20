<?php
session_start();
include ("database_connection2.php");
$userID = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="rosey/img/WITH-BG/1.png" />
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="imane/provform.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>G-job provider form</title>
</head>

<body>
<?php include("navbarrosey.php"); ?>
    <div id="all-page">
        


        <div id="page">
           <div id="side-bar">
                <div id="fill-gap">
                    <p id="dec">Share your offer with us!</p>
                    <p id="dec-description"> "By providing thorough opportunities, you can draw in the ideal candidate for your available position. Clearly outlining your needs can help you connect with the best individuals for any size position. Publish clear and attractive job postings to improve your hiring process and create the conditions for selecting the best candidate for your business." </p>
                </div>
                <img id="form-illustration" src="imane/pics/Forms-bro.png" alt="">
            </div>
            <div id="whole-form">
                <div class="whole-form">
                    <form action="processprovform.php" method="post" class="post-info">

                        <div class="poster-info">
                            <h3 id="section-title1" class="section-title">ABOUT THE EMPLOYER </h3>
                            <label for="name">Full name: </label>
                            <input id="fullname" size="38" class="post-info" type="text" name="name">
                            <span class="error-message"></span>
                            <label for="phone-number">Phone number: </label>
                            <input type="tel" class="post-info" name="phone-number" id="numphone">
                            <span class="error-message"></span>
                            <label for="p-mail">Personal E-mail: </label>
                            <input id="personal" size="38" class="post-info" type="text" name="p-mail">
                            <span class="error-message"></span>
                            <label for="domaine">Domain: </label>
                            <select name="domaine" id="drop-down" required>
                                <option value=""></option>
                                <option value="Government and Public Service">Government and Public Service</option>
                                <option value="Business and Management">Business and Management</option>
                                <option value="Medical field">Medical field</option>
                                <option value="Healthcare">Healthcare</option>
                                <option value="Education">Education</option>
                                <option value="Engineering">Engineering</option>
                                <option value="IT">Information Technology</option>
                                <option value="Finance">Finance</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Arts and Entertainments">Arts and Entertainment</option>
                            </select>
                        </div>

                        <div class="company-info">
                            <h3 id="#section-title2" class="section-title">ABOUT THE COMPANY </h3>
                            <label for="company-name">Company name:</label>
                            <input id="companyname" size="38" class="post-info" type="text" name="company-name">
                            <label for="location">Location: </label>
                            <input id="company-location" size="38" class="post-info" type="text" name="location">
                            <label for="more01">More: </label>
                            <textarea name="more01" id="more-info" cols="34" rows="6"></textarea>
                        </div>

                        <div class="job-info">
                            <h3 class="section-title">ABOUT THE JOB</h3>
                            <label for="position">Job position: </label>
                            <input id="job-pos" size="38" class="post-info" type="text" name="position">
                            <span class="error-message"></span>
                            <label for="salary"> Fixed salary: </label>
                            <input id="fix-salary" size="38" class="post-info" type="text" name="salary">
                            <span class="error-message"></span>
                            <label for="requirements">Job requirements: </label>
                            <textarea name="requirements" id="job-requirements" cols="34" rows="10"></textarea>
                            <span class="error-message"></span>
                            <label for="more02">Other specifications: </label>
                            <textarea id="specifications" name="more02" cols="34" rows="5"></textarea>
                        </div>

                        <div class="contact-info">
                            <h3 class="section-title">CONTACT US</h3>

                            <input id="prov-email" size="38" class="info" type="text" name="mail" placeholder="E-mail">
                            <input id="prov-insta" size="38" class="info" type="text" name="insta"
                                placeholder="Instagram">
                            <input id="prov-fb" size="38" class="info" type="text" name="facebook"
                                placeholder="facebook">
                            <input size="38" class="info" type="text" name="linkedIn" placeholder="linkedIn">

                        </div>
                        <div id="submitButton">
                            <input id="submit-but" type="submit" name="submit">
                        </div>
                    </form>

                </div>


            </div>

            <script>
                let myform = document.querySelector('.post-info');

                let FullName = document.querySelector('#fullname');
                let PhoneNumber = document.querySelector('#numphone');
                let PersonalEmail = document.querySelector('#personal');
                let Domaine = document.querySelector('#drop-down');
                let JobPosition = document.querySelector('#job-pos');
                let Salary = document.querySelector('#fix-salary');
                let JobSpec = document.querySelector('#job-requirements');
                let CompanyName = document.querySelector('#companyname');
                let CompanyLocation = document.querySelector('#company-location');
                let More = document.querySelector('#more-info');
                let Specifications = document.querySelector('#specifications');
                let Instagram = document.querySelector('#prov-insta');
                let Facebook = document.querySelector('#prov-fb');
                let OtherContact = document.querySelector('#prov-email');

                let SubmitButton = document.querySelector('#submit-but');


                SubmitButton.addEventListener('click', (eventt) => {
                    if (redirect() === false) eventt.preventDefault();
                    else alert('Posted successfully, Thank you!');
                })

                function redirect() {
                    checkInputs();
                    if (
                        checkIn(FullName) &&
                        checkIn(PhoneNumber) &&
                        checkIn(PersonalEmail) &&
                        checkIn(JobPosition) &&
                        checkIn(Salary) &&
                        checkText(JobSpec) &&
                        checkDrop(Domaine)
                    ) {
                        return true;
                    } else {
                        return false;
                    }
                }


                function checkIn(input) {
                    if (input.classList.contains('success')) return true;
                    else return false;
                }

                function checkText(textarea) {
                    if (textarea.classList.contains('success')) return true;
                    else return false;
                }

                function checkInputs() {
                    const FullNameValue = FullName.value.trim();
                    const PhoneNumberValue = PhoneNumber.value.trim();
                    const PersonalEmailValue = PersonalEmail.value.trim();
                    const JobPositionValue = JobPosition.value.trim();
                    const SalaryValue = Salary.value.trim();
                    const JobSpecValue = JobSpec.value.trim();

                    if (FullNameValue === '')
                        setErrorClassFirst(FullName, 'full name field can not be left empty');
                    else setSuccessClassFirst(FullName);


                    if (PhoneNumberValue === '')
                        setErrorClassFirst(PhoneNumber, 'please enter a phone number first')
                    else if (!isPhoneNumber(PhoneNumberValue)) {
                        setErrorClassFirst(PhoneNumber, 'please enter a valid phone number ')
                    }
                    else setSuccessClassFirst(PhoneNumber);


                    if (PersonalEmailValue === '')
                        setErrorClassFirst(PersonalEmail, 'please enter an email');
                    else if (!isEmail(PersonalEmailValue))
                        setErrorClass(PersonalEmail, 'please enter a valid email');
                    else setSuccessClassFirst(PersonalEmail);

                    if (JobPositionValue === '')
                        setErrorClassFirst(JobPosition, 'Job position field can not be left empty');
                    else setSuccessClassFirst(JobPosition);

                    if (SalaryValue === '')
                        setErrorClassFirst(Salary, 'please enter a salary');
                    else setSuccessClassFirst(Salary);

                    if (JobSpecValue === '')
                        setErrorClassSecond(JobSpec, 'please enter job specifications');
                    else setSuccessClassSecond(JobSpec);
                }

                function setErrorClassFirst(input, message) {
                    const errorSpan = input.nextElementSibling;
                    errorSpan.textContent = message;
                    if (input.classList.contains("success")) input.classList.remove("success");
                    input.classList.add("error");
                }

                function setErrorClassSecond(textarea, message) {
                    const errorSpansec = textarea.nextElementSibling;
                    errorSpansec.textContent = message;
                    if (textarea.classList.contains("success")) textarea.classList.remove("success");
                    textarea.classList.add("error");
                }

                function setSuccessClassFirst(input) {
                    if (input.classList.contains("error")) input.classList.remove("error");
                    input.classList.add("success");
                }

                function setSuccessClassSecond(textarea) {
                    if (textarea.classList.contains("error")) textarea.classList.remove("error");
                    textarea.classList.add("success");
                }

                function isEmail(Email) {
                    return /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test(Email);
                }

                function isPhoneNumber(PhoneNumber) {
                    return /^([0]{1}[5-7]{1}[0-9]{8})$/.test(PhoneNumber);
                }

                function checkDrop() {
                    var selectedValue = Domaine.value;
                    const errorSpan = Domaine.nextElementSibling;

                    if (selectedValue === '') {
                        errorSpan.textContent = 'Please select an option';
                        if (Domaine.classList.contains('success')) Domaine.classList.remove('success');
                        Domaine.classList.add('error');
                        return false;
                    } else {
                        errorSpan.textContent = '';
                        if (Domaine.classList.contains('error')) Domaine.classList.remove('error');
                        Domaine.classList.add('success');
                        return true;
                    }
                }

                
            </script>

            <script src="imane/provform.js"></script>
            <script src="imane/navbar.js"></script>
            <script src="imane/sidebar.js"></script>
        </div>

    </div>

</body>

</html>



