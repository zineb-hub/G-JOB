<?php
session_start();
include('database_connection.php');
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
JOIN post_prov ON users.id_user = post_prov.userID_prov
WHERE post_prov.post_id = ?";
$statement = $connect->prepare($sql2);
$statement->bind_param("i",$postID);
$statement->execute();
$statement->bind_result($id,$idpfp);
$statement->fetch();
$statement->close();



$sql = "SELECT funame_prov, phone_number, email_prov, domain_post, company_name,company_location,company_info,job_position, 
f_salary, job_requirements,job_spec,email_add,prov_insta,prov_fb,prov_linkedin FROM post_prov WHERE post_id = ?";

$stmt = $connect->prepare($sql);
if ($stmt) {
	// Bind the parameters 
	$stmt->bind_param("i", $postID);

	// Execute the query 
	$stmt->execute();

	// Bind the results 
	$stmt->bind_result($funame_prov, $phone_number, $email_prov, $domain_post, $company_name, $company_location, $company_info, $job_position, $f_salary, $job_requirements, $job_spec, $email_add, $prov_insta, $prov_fb, $prov_linkedin);

	// Fetch the results 
	$stmt->fetch();
	$stmt->close();

}
if (isset($_POST['submit'])) {
	$comment = isset($_POST['comment']) ? htmlspecialchars($_POST['comment']) : '';

	$sqlStmt = "INSERT INTO comments_post_prov (comment_content, id_post, id_user) VALUES (?, ?, ?)";

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
	<link rel="stylesheet" href="imane/seekerpost.css" />
	<link rel="stylesheet" href="imane/provpost.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400;500;600;700;800&display=swap"
		rel="stylesheet" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
</head>

<body>
	<div id="parent-container">
		<?php
		include("navbarrosey.php");
		?>
		<div class="whole-post">
			<div id="first-part">
				<div class="profile-pic">
				<a target="_blank" onclick="setUserIdCookie('<?php echo $id ?>')" href="otherviewprofile.php">
						<img class="picture" src=<?php echo $idpfp ?> alt="" /> </a>
				</div>
				<div class="poster-information">
					<p class="full-name">
					<a style="color:black;" href="otherviewprofile.php" onclick="setUserIdCookie('<?php echo $id ?>')"><?php echo $funame_prov ?></a>
					</p>
					<p class="domain">
						<?php echo $domain_post ?>
					</p>
				</div>
				<div class="profile-buttons">
					<form action="interestedprov.php" method="post">
						<button id="interest" type="submit" name="storeValue" onclick="alert('info has been saved, thank you!');">interested</button>
					</form>
				</div>
			</div>



			<div class="job-information">
				<h6 class="section-header">About the job:</h6>
				<p class="content" id="content-position">
					<?php echo "Job position: $job_position" ?>
				</p>
				<p class="content" id="content-salary">
					<?php echo "Fixed salary: $f_salary" ?>
				</p>
				<p class="content" id="content-requirements">
					<?php echo "Job requirements: $job_requirements" ?>
				</p>
				<p class="content" id="content-specifications">
					<?php echo "Job specifications: $job_spec" ?>
				</p>
			</div>

			<div class="company-information">
				<h6 class="section-header">About the company:</h6>
				<p class="content" id="company-name">
					<?php echo "Company name: $company_name" ?>
				</p>
				<p class="content" id="company-location">
					<?php echo "Company location: $company_location" ?>
				</p>
				<p class="content" id="company-more">
					<?php echo "More: $company_info" ?>
				</p>
			</div>

			<div class="employer-information">
				<h6 class="section-header">About the employer:</h6>
				<p class="content" id="content-email">
					<?php echo "Personal Email: $email_prov" ?>
				</p>
				<p class="content" id="content-number">
					<?php echo "Personal number: $phone_number" ?>
				</p>
			</div>

			<div class="contact-information">
					<h6 class="section-header">Contact info:</h6>
					<div id="content" style="display: flex; flex-direction:column;">
						
							<a href="<?php echo $prov_insta ?>" style="color:black;">Provider instagram </a> 
						
							<a href="<?php echo $prov_fb ?>" style="color:black;">Provider facebook</a> 

							<a href="<?php echo $prov_linkedin ?>" style="color:black;">Provider linkedin</a>

					</div>
			</div>
		</div>
		<div id="commentDiv">
			<div id="commentaires">
				<div id="add-comment">
					<form action="provpost.php" method="post">
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
			const storeCName = localStorage.getItem("companyName")
			const storeCLocation = localStorage.getItem("companyLocation")
			const storeMore = localStorage.getItem("more")
			const storeInsta = localStorage.getItem("instagram")
			const storeFB = localStorage.getItem("facebook")
			const storeOther = localStorage.getItem("othercontact")

			//first part of the post
			if (storeName !== "") {
				let NameField = document.querySelector(".full-name")
				NameField.textContent = storeName
			}

			if (storeDomaine !== "") {
				let DomaineField = document.querySelector(".domain")
				DomaineField.textContent = storeDomaine
			}

			//about the job part
			if (storeMore !== "") {
				let ExperienceField = document.querySelector(
					"#content-requirements"
				)
				ExperienceField.textContent = "Job requirements : " + storeMore
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

			//about the company
			if (storeCName !== "") {
				let CNameField = document.querySelector("#company-name")
				CNameField.textContent = "Company name : " + storeCName
			}

			if (storeCLocation !== "") {
				let CLocationField = document.querySelector("#company-location")
				CLocationField.textContent =
					"Company location : " + storeCLocation
			}

			//about the employer
			if (storeEmail !== "") {
				let EmailField = document.querySelector("#content-email")
				EmailField.textContent = "Personal Email : " + storeEmail
			}

			if (storeNumber !== "") {
				let NumberField = document.querySelector("#content-number")
				NumberField.textContent = "Phone number : " + storeNumber
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
				url: "add_comments_provider.php",
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


	<script src="rosey/js/about.js"></script>
	<script src="imane/interested.js"></script>

	<script>
		function expandprofile(id) {
			document.cookie = "userId=" + id + "; path=/";
			window.location.href="otherviewprofile.php";
		}
	</script>
</body>

</html>