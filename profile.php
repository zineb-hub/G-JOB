<?php
include_once("database_connection.php");
session_start();
$userID = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE users.id_user=?";
$stmt = $connect->prepare($query);
$stmt->bind_param('i', $userID);
$stmt->execute();
if ($stmt->error) {
	echo "Error: " . $stmt->error . "<br>";
}
$result = $stmt->get_result();
$user = $result->fetch_object();
$first = $user->first_name_usr ?? '';
$second = $user->last_name_usr ?? '';
$skills = $user->skills_text ?? '';
$edu = $user->education_text ?? '';
$exp = $user->experience_text ?? '';
$pfp = $user->profile_pic_user ?? '';
$address = $user->address_usr ?? '';
$city = $user->city_usr ?? '';
$gender = $user->gender_usr ?? '';
$bd = $user->birthdate_usr ?? '';
$cv = $user->cv_file ?? '';
$bio = $user->bio_usr ?? '';
$langquery = "SELECT * FROM languages where id_user=?";
$stmt1 = $connect->prepare($langquery);
$stmt1->bind_param('i', $userID);
$stmt1->execute();
if ($stmt1->error) {
	echo "Error: " . $stmt1->error . "<br>";
}
$result1 = $stmt1->get_result();
$count1 = $result1->num_rows;
$langarray = array();
for ($i = 1; $i <= $count1; $i++) {
	$langarray[] = ($result1->fetch_assoc())["language_text"];
}

$posts = array();
$sqls = "SELECT * FROM post_seekers WHERE userID_seek = ?";
$stmts = $connect->prepare($sqls);
$stmts->bind_param("i", $userID);
$stmts->execute();
$results = $stmts->get_result();
$counts = $results->num_rows;
for ($i = 0; $i < $counts; $i++) {
	$posts[] = $results->fetch_assoc();
}
$results->free_result();
$stmts->close();
$sqlp = "SELECT * FROM post_prov WHERE userID_prov = ?";
$stmtp = $connect->prepare($sqlp);
$stmtp->bind_param("i", $userID);
$stmtp->execute();
$resultp = $stmtp->get_result();
$countp = $resultp->num_rows;
for ($i = 0; $i < $countp; $i++) {
	$posts[] = $resultp->fetch_assoc();
}
$resultp->free_result();
$stmtp->close();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<title>My Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="rosey/img/WITH-BG/1.png" />
	<link rel="stylesheet" href="rosey/css/UserNavBar.css" />
	<link rel="stylesheet" href="rosey/css/profile.css" />
</head>

<body>
	<?php
	include("navbarrosey.php");
	?>

	<div class="profile-page" id="profile">
		<nav>
			<ul>
				<li id="aboutTab">About</li>
				<li id="postsTab">Posts</li>
			</ul>
		</nav>

		<div id="about" class="show">
			<div class="about-page">
				<div class="about-content">
					<button onclick="edit()" class="expand-post">
						Edit
					</button>

					<img id='profile-picture' class='pfp' src=<?php echo $pfp ?> />

					<?php
					echo "<h4>$first $second</h4>";
					?>
					<hr />
					<?php
					echo "<div class='first-info'>
						<p>City :</p>
						<p>$city</p>
						<p>Address:</p>
						<p>$address</p>
						<p>Gender:</p>
						<p>$gender</p>
						<p>Date of birth</p>
						<p>$bd</p>
					</div>"
						?>
				</div>
				<img width="200x" src="rosey/img/Profile.png" />

				<div class="about-content">
					<h4>Description:</h4>
					<?php
					echo "<p>
					$bio
				</p>";
					?>
					<hr />
					<h4>Languages</h4>
					<?php
					$i = 1;
					foreach ($langarray as $value) {
						echo "Language $i : " . $value . "<br>";
						$i++;
					}
					?>
					<hr />
					<h4>Skills</h4>
					<?php
					echo $skills . "<br>";
					?>
					<hr />
					<h4>Education</h4>
					<?php
					echo $edu . "<br>";
					?>
					<hr />
					<h4>Experience</h4>
					<?php
					echo $exp . "<br>";

					echo "<br><br>"
						?>
					<?php
					echo "
					<button onclick='download(\"$cv\")' class='expand-post relativetopost' style='margin-bottom: 30px'>
						MY CV
					</button>";
					?>
				</div>
			</div>
		</div>

		<div id="posts">
			<div class="posts-page">
				<div class="posts-content">
					<h1>Posts:</h1>
					<div style="display: flex">
						<a href="seekform.php"><button class="expand-post" style="background-color: #fff6e0">
								Create A Post (Seeking)
							</button></a>
						<a href="provform.php"><button class="expand-post" style="background-color: #cdd4ca">
								Create A Post (Providing)
							</button></a>
					</div>
					<div class="posts-grid">
						<div class="image-container-posts">
							<img class="posts-img" src="rosey/img/Posts-amico.png" />
						</div>
						<?php
						if (empty($posts))
							echo "Nothing to see here!";
						else
							foreach ($posts as $post) {
								$title = $post['job_position'];
								$description = $post['job_spec'];
								$type = $post['post_type'];
								$postid = $post['post_id'];
								//in each post ndir url/cookie sending 
						
								$link = ($type == 'provider') ? 'provpost.php' : 'seekpost.php';
								echo
									"<div class='post-item'>
								<h4>
									<a href=$link>$title</a>
								<hr />

							</h4>";
								if ($type == 'provider')
									echo "
							<p class='tag-provider'>$type</p>
							<hr />";
								else if ($type == 'seeker')
									echo "
								<p class='tag-seeker'>$type</p>
							<hr />";
								echo "
							<p>
								$description
							</p>
							<div class='posts-bar'>
							
								<button onclick=expand(\"$postid\",\"$link\") class='expand-post relativetopost'>
							Expand
						</button>
						
							</div>
							</div>
							";
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="rosey/js/about.js"></script>
	<script>
		function edit() {
			window.location.href = "EditProfile.php"
		}
		function download(str) {
			window.location.href = str
		}
		function expand(id, link) {
			window.location.href = link;
			document.cookie = "postId=" + id + "; path=/";

		}	
	</script>
</body>

</html>