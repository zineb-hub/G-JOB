<?php
include_once("database_connection2.php");
session_start();
$userID = $_SESSION["user_id"];
$query = "SELECT first_name_usr,last_name_usr,email_usr,profile_pic_user FROM users WHERE users.id_user=?";
$stmt = $connect->prepare($query);
$stmt->bind_param('i', $userID);
$stmt->execute();
if ($stmt->error) {
	echo "Error: " . $stmt->error . "<br>";
}
$result = $stmt->get_result();
$user = $result->fetch_object();
$fn = htmlspecialchars($user->first_name_usr);
$ln = htmlspecialchars($user->last_name_usr);
$em = htmlspecialchars($user->email_usr);
$pfp = htmlspecialchars($user->profile_pic_user);
?>


<html>

<head>
	<link rel="stylesheet" href="rosey/css/UserNavBar.css" />
	<link rel="icon" href="rosey/img/WITH-BG/1.png" />
	<link rel="stylesheet" href="rosey/css/settings.css" />
	<title>Settings</title>
</head>

<body>
	<?php
	include("navbarrosey.php");
	?>
	<div class="settings-page">
		<img class="settings-img" src="rosey/img/settings.png" />
		<div class="settings-container">
			<h1>Settings</h1>
			<div class="settings-section">
				Need to update your public profile?
				<a style="color: grey" class="gotoprofile" href="profile.php">Go to My Profile</a>
			</div>
			<hr />
			<form method="post" action="settingsF1.php" id="form1">
				<div class="settings-section">
					<h3>Personal Information</h3>
					<div class="settings-grid">
						<label for="first_name">FIRST NAME</label>
						<?php
						echo "<input required='required' id='first_name' name='first_name' type='text' class='settings-inputs'
						placeholder='enter your first name here' value=$fn />";
						?>
						<label for='last_name'>LAST NAME</label>
						<?php echo "
						<input required='required' id='last_name' name='last_name' type='text' class='settings-inputs'
							placeholder='enter your last name here' value=$ln />";
						?>
						<label for="email">EMAIL</label>
						<?php echo "
						<input required='required' id='email' name='email' type='text' class='settings-inputs'
							placeholder='enter your email' value=$em />";
						?>
					</div>
					<input type="submit" value="Save Changes" class="savebutton" id="firstsave" />
					<small></small>
					<hr />
				</div>
			</form>
			<form method="post" action="settingsF2.php" id="form2">
				<div class="settings-section">
					<h3>Account Deletion</h3>
					<p>
						Your profile and posts won't be shown on G-jobs
						anymore.<br />You will no longer be able to access
						your account.
					</p>
					<input type="submit" value="Delete Account" id="deactivate" class="savebutton" />
					<hr />
				</div>
			</form>
			<form method="post" action="settingsF3.php" id="form3">
				<div class="settings-section">
					<h3>Security</h3>
					<div class="settings-grid">
						<label for="currpw">Current Password:</label>
						<input type="password" class="settings-inputs" name="old_pw"
							placeholder="enter your current password here" id="currpw" />
						<label for="newpw">New Password:</label>
						<input type="password" class="settings-inputs" name="new_pw"
							placeholder="enter new password here" id="newpw" />
						<label for="conpw">Confirmation:</label>
						<input type="password" class="settings-inputs" name="pw_confirmation"
							placeholder="confirm password here" id="conpw" />
					</div>
					<input id="secondsave" type="submit" value="Save Changes" class="savebutton" />
					<div class="small2"></div>
				</div>
			</form>
		</div>
	</div>

	<script src="rosey/js/stngs.js"></script>

</body>

</html>