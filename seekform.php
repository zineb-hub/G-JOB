<?php
session_start();

include ("database_connection2.php");
$userID = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="rosey/img/WITH-BG/1.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="imane/provform.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>G-job seeker form</title>
</head>

<body>
    <div class="all-page">
        <?php include ('navbarrosey.php'); ?>
        <div id="page">
            <div id="side-bar">
                <div id="fill-gap">
                    <p id="dec">What are you looking for?</p>
                    <p id="dec-description">Maximize your job search effectiveness by posting your precise 
                        criteria. Your professional attributes and preferences are key to 
                        connecting with the right opportunities. 
                        Elevate your chances of success by confidently sharing 
                        your job criteria and positioning yourself as a standout 
                        candidate in the competitive job market.
                    </p>
                </div>
                <img id="form-illustration" src="imane/pics/Forms-bro.png" alt="">
            </div>
            <div id="whole-form">
                <div class="whole-form">
                    <form action="processseekform.php" class="post-form" method="post">

                        <div class="poster-info">
                            <h3 class="section-title">ABOUT THE APPLICANT</h3>
                            <label for="name">Full name: </label> <!--!required-->
                            <input id="full-name" size="35" class="post-info" type="text" name="name">
                            <span class="error-message"></span>
                            <label for="phone-number">Phone number: </label> <!--!required-->
                            <input id="Phone" type="tel" class="post-info" name="phone-number">
                            <span class="error-message"></span>
                            <label for="p-mail">Personal E-mail: </label>
                            <input id="perso-email" size="35" class="post-info" type="email" name="p-mail">
                            <span class="error-message"></span>
                            <label for="domaine">Domain: </label>
                            <select name="domaine" id="drop-down" required> <!--!required-->
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
                            <span class="error-message"></span>
                        </div>

                        <div class="education-level">
                            <h3 class="section-title">ABOUT THE EDUCATION</h3>
                            <label for="school">School attended: </label>
                            <input id="school-attended" size="35" class="post-info" type="text" name="school">
                            <label for="degree">Degree: </label>
                            <input id="degree-obtained" size="35" class="post-info" type="text" name="degree">
                            <label for="experience">Past experience: </label>
                            <textarea name="experience" id="experience" cols="34" rows="8"></textarea>
                        </div>

                        <div class="job-info">
                            <h3 class="section-title">ABOUT THE JOB</h3>
                            <label for="position">Position:</label> <!--!required-->
                            <input id="job-pos" size="35" type="text" class="post-info" name="position">
                            <span class="error-message"></span>
                            <label for="salary-wanted-wanted">Salary: </label> <!--!required-->
                            <input id="salary-wanted-prop" size="35" type="text" class="post-info" name="salary-wanted">
                            <span class="error-message"></span>
                            <label for="start-date">Start date: </label>
                            <input type="date" class="post-info" name="start-date" id="calendar">
                            <label for="more03">Additions(Job specifications): </label> <!--!required-->
                            <textarea name="more03" id="additions" cols="34" rows="6"></textarea>
                            <span class="error-message"></span>
                        </div>

                        <!--<div class="extra-docs">
                            <h3 class="section-title">EXTRA DOCUMENTS</h3>
                            <label for="files"></label>
                            <p class="section-description">in this section, you can embed extra documents.</p>
                            <input type="file" class="post-info" name="files">
                        </div>-->

                        <div class="contact-info">
                            <h3 class="section-title">CONTACT INFO</h3>

                            <input id="seek-insta" size="38" class="info" type="text" name="insta"
                                placeholder="Instagram">
                            <input id="seek-fb" size="38" class="info" type="text" name="facebook"
                                placeholder="facebook">
                            <input id="seek-other" size="38" class="info" type="text" name="other" placeholder="other">

                        </div>
                        <div id="submitButton">
                            <input id="submit-but" type="submit" name="submit">
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <script>
            let myform = document.querySelector('.post-form');

            let FullName = document.querySelector('#full-name');
            let PhoneNumber = document.querySelector('#Phone');
            let PersonalEmail = document.querySelector('#perso-email');
            let Domaine = document.querySelector('#drop-down');
            let JobPosition = document.querySelector('#job-pos');
            let Salary = document.querySelector('#salary-wanted-prop');
            let JobSpec = document.querySelector('#additions'); //
            let School = document.querySelector('#school-attended');
            let Degree = document.querySelector('#degree-obtained');
            let Experience = document.querySelector('#experience');
            let Calendar = document.querySelector('#calendar');
            let Instagram = document.querySelector('#seek-insta');
            let Facebook = document.querySelector('#seek-fb');
            let OtherContact = document.querySelector('#seek-other');

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
                    setErrorClassFirst(Salary, 'please enter a salary-wanted');
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
                    errorSpan.textContent = ''; // Clear error message
                    if (Domaine.classList.contains('error')) Domaine.classList.remove('error');
                    Domaine.classList.add('success');
                    return true;
                }
            }

        </script>
        <script src="imane/navbar.js"></script>
        <script src="imane/sidebar.js"></script>
        <script src="imane/seekformval.js"></script>
        <script src="imane/seekformpost.js"></script>

</body>

</html>
