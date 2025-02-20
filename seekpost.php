<?php
session_start();
include ('database_connection.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$userID = $_SESSION['user_id'];

$postID = "";
if (isset($_COOKIE['postId'])) { 
    $postID = $_COOKIE['postId']; 
} 

$_SESSION['postId'] = $postID;

$sql2 = "SELECT users.id_user, users.profile_pic_user
FROM users
JOIN post_seekers ON users.id_user = post_seekers.userID_seek
WHERE post_seekers.post_id = ?";
$statement = $connect->prepare($sql2);
$statement->bind_param("i",$postID);
$statement->execute();
$statement->bind_result($id,$idpfp);
$statement->fetch();
$statement->close();



$sql = "SELECT funame_seek, phone_number, email_seek, domain_post, school_seeker,degree_seeker,job_position, salary_job,
job_spec,file_seeker,start_date_seeker,seek_insta,seek_fb,seek_linkedin,seek_experience FROM post_seekers WHERE post_id = ? ";
$stmt = $connect->prepare($sql);
if ($stmt) {
    // Bind the parameters
    $stmt->bind_param("i", $postID);

    // Execute the query
    $stmt->execute();

    // Bind the results
    $stmt->bind_result($funame_seek, $phone_num, $email_seek, $domain_post, $school, $degree, $job_position, $job_salary, $job_spec, $fichier,$start_date, $seek_insta, $seek_fb, $seek_linkedin, $seek_experience);

    // Fetch the results
    $stmt->fetch();
	$stmt->close();

}

if(isset($_POST['submit'])) {
    $comment = isset($_POST['comment'])? htmlspecialchars($_POST['comment']) : '';
    
    $sqlStmt = "INSERT INTO comments_post_seek (comment_content, id_post, id_user) VALUES (?, ?, ?)";
    
    $stmt2 = $connect->prepare($sqlStmt);
    $stmt2->bind_param("sii", $comment, $postID, $userID);
    $result = $stmt2->execute();
	$stmt2->close();
}
?>
<!DOCTYPE html>
<html>
	<head>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

		<link rel="icon" href="rosey/img/WITH-BG/1.png" />
		<link rel="stylesheet" href="rosey/css/UserNavBar.css" />
		<link rel="stylesheet" href="rosey/css/profile.css" />
		<!--<link rel="stylesheet" href="imane/seekerpost.css" /> -->
		<link rel="stylesheet" href="imane/provpost.css" />
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
			rel="stylesheet"
		/>

        <script>
            const postId = getCookie('postId');
        </script>
	</head>

	<body>
		<div id="parent-container">
			<?php 
			include("navbarrosey.php");
			?>
			<br><br><br><br><br>
			<div class="whole-post">
				
				<div id="first-part">
				<div class="profile-pic">
				<a target="_blank" onclick="setUserIdCookie('<?php echo $id ?>')" href="otherviewprofile.php">
						<img class="picture" src=<?php echo $idpfp ?> alt="" /> </a>
				</div>
					<div class="poster-information">
						<p class="full-name"><a style="color:black;" href="otherviewprofile.php" onclick="setUserIdCookie('<?php echo $id ?>')"><?php echo $funame_seek ?></a></p>
						<p class="domain"><br /> <?php echo $domain_post ?></p>
					</div>
					<div class="profile-buttons">
						<form action="interestedseek.php" method="post">
							<button id="interest" type="submit" name="storeValue" onclick="alert('info has been saved, thank you!');">interested</button>
						</form>
					</div>
				</div>

				

				<div class="education-information">
					<h6 class="section-header">
						About the educational background:
					</h6>
					<p class="content" id="content-school"><?php echo "School attended : $school" ?></p>
					<p class="content" id="content-degree"><?php echo "Degree obtained : $degree" ?></p>
					<p class="content" id="content-experience"><?php echo "Experience : $seek_experience" ?></p>
				</div>

				<div class="job-information">
					<h6 class="section-header">About the job:</h6>
					<p class="content" id="content-position"><?php echo "Job position : $job_position" ?></p>
					<p class="content" id="content-salary"><?php echo "Job salary : $job_salary" ?></p>
					<p class="content" id="content-specifications"><?php echo "Job specifications : $job_spec" ?></p>
				</div>


				<div class="contact-information">
					<h6 class="section-header">Contact info:</h6>
					<div id="content" style="display: flex; flex-direction:column;">
						
							<a href="<?php echo $seek_insta ?>" style="color:black;">Seeker instagram </a> 
						
							<a href="<?php echo $seek_fb ?>" style="color:black;">Seeker facebook </a> 

							<a href="<?php echo $seek_linkedin ?>" style="color:black;">Seeker linkedin</a>

					</div>
			</div>
			</div>
			<div id="commentDiv">
				<div id="commentaires">
					<div id="add-comment">
						<form action="seekpost.php" method="post">
							<input id="comment-field" type="text" placeholder="Add a comment" name="comment">
							<input type="submit" id="post-comment" name="submit">
						</form>
					</div>
					<div class="comment-section">
					</div>
				</div>
			</div>
		</div>

		<!-- <script>
			const storeName = localStorage.getItem("full-name")
			const storeNumber = localStorage.getItem("phone")
			const storeEmail = localStorage.getItem("perso-email")
			const storeJPosition = localStorage.getItem("Job-pos")
			const storeSalary = localStorage.getItem("salary-prop")
			const storeSpecifications = localStorage.getItem("additions")
			const storeDomaine = localStorage.getItem("domaine")
			const storeSchool = localStorage.getItem("school")
			const storeDegree = localStorage.getItem("degree")
			const storeExperience = localStorage.getItem("experience")
			const storeCalendar = localStorage.getItem("date")
			const storeInsta = localStorage.getItem("instagram")
			const storeFB = localStorage.getItem("facebook")
			const storeOther = localStorage.getItem("othercontact")

			if (storeName !== "") {
				let NameField = document.querySelector(".full-name")
				NameField.textContent = storeName
			}

			if (storeDomaine !== "") {
				let DomaineField = document.querySelector(".domain")
				DomaineField.textContent = storeDomaine
			}

			if (storeSchool !== "") {
				let SchoolField = document.querySelector("#content-school")
				SchoolField.textContent = "School attended : " + storeSchool
			}

			if (storeDegree !== "") {
				let DegreeField = document.querySelector("#content-degree")
				DegreeField.textContent = "Degree obtained : " + storeDegree
			}

			if (storeExperience !== "") {
				let ExperienceField = document.querySelector(
					"#content-experience"
				)
				ExperienceField.textContent =
					"Past experience : " + storeExperience
			}

			if (storeJPosition !== "") {
				let PositionField = document.querySelector("#content-position")
				PositionField.textContent = "Job position : " + storeJPosition
			}

			if (storeSalary !== "") {
				let SalaryField = document.querySelector("#content-salary")
				SalaryField.textContent = "Salary : " + storeSalary
			}

			if (storeSpecifications !== "") {
				let SpecField = document.querySelector(
					"#content-specifications"
				)
				SpecField.textContent =
					"Extra specifications : " + storeSpecifications
			}
		</script> -->
<script>
$(document).ready(function () {
	addComments();
	setInterval(() => {
		addComments();
	}, 10000);
});

function addComments() {
    $.ajax({
        url: "add_comments_seeker.php",
        method: "POST",
        dataType: "html",
        success: function (data) {
            $('.comment-section').html(data);
        },
        error: function (error) {
            console.error("AJAX Error:", error);
        }
    });
}
</script>
		<script src="imane/interested.js"></script>
		<script src="imane/seekformpost.js"></script>
	</body>
</html>
