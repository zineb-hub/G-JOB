<?php
include_once("database_connection2.php");
session_start();
$userID = $_SESSION["user_id"];
$query = "SELECT * FROM users WHERE users.id_user=?";
$stmt = $connect->prepare($query);
$stmt->bind_param('i', $userID);
$stmt->execute();
if ($stmt->error) {
	echo "Error: " . $stmt->error . "<br>";
}
$result = $stmt->get_result();
$user = $result->fetch_object();
$first = htmlspecialchars($user->first_name_usr);
$second = htmlspecialchars($user->last_name_usr);

$pfp = htmlspecialchars($user->profile_pic_user);

$address = htmlspecialchars($user->address_usr);
$city = htmlspecialchars($user->city_usr);
$gender = htmlspecialchars($user->gender_usr);
$bd = htmlspecialchars($user->birthdate_usr);

$cv = htmlspecialchars($user->cv_file);
$bio = htmlspecialchars($user->bio_usr);

$exp = htmlspecialchars($user->experience_text);
$edu = htmlspecialchars($user->education_text);
$skills = htmlspecialchars($user->skills_text);

?>
<html>

<head>
	<title>Edit Profile</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="icon" href="rosey/img/WITH-BG/1.png" />
	<link rel="stylesheet" href="rosey/css/UserNavBar.css" />
	<link rel="stylesheet" href="rosey/css/EditProfile.css" />
	<link rel="stylesheet" href="rosey/css/profile.css" />
	<script src="rosey/js/editP.js"></script>
	<script src="rosey/js/about.js"></script>
</head>

<body>
	<?php
	include("navbarrosey.php");
	?>
	<form style="width: 100%; margin: 0px" action="editprofileform.php" method="post" enctype="multipart/form-data">

		<div class="editing-page">
			<div class="about-page">
				<div class="about-content">
					<img id='profile-picture' class='pfp' src=<?php echo $pfp; ?> />

					<button id="deletepfp" class="expand-post" type="button">
						Delete Profile Picture
					</button>
					<input type="text" id="pfpdel" name="pfpdel" value="" style="display:none;">
					<label for="pfp_up" class="labela">
						Upload a new profile picture
					</label>
					<input id="pfp_up" name="pfp_up" type="file" style="display: none"
						onchange="changeProfilePicture(event)" />
					<?php
					echo "<h4>$first $second</h4>";
					?>
					<hr />
					<div class="first-info">
						<label for="city">City :</label>
						<?php
						echo "<input class='editing-inputs' id='city' name='city' placeholder='Your City' type='text' value=$city 
						/>";
						?>
						<label for='address'>Address:</label>
						<?php
						echo "<input class='editing-inputs' id='address'	placeholder='Your address' name='address' type='text' value=$address
						/>";
						?>
						<label for='gender'>Gender:</label>
						<?php


						if ($gender == "Female")
							echo "
						<select class='editing-inputs' id='gender' name='gender'>
						<option selected>Female</option>
						<option>Male</option>
						<option>Prefer not to say</option>
						</select>";
						elseif ($gender == "Male")
							echo "
						<select class='editing-inputs' id='gender' name='gender'>
						<option >Female</option>
						<option selected>Male</option>
						<option>Prefer not to say</option>
						</select>";
						else
							echo "
						<select class='editing-inputs' id='gender' name='gender'>
						<option>Female</option>
						<option>Male</option>
						<option selected>Prefer not to say</option>
						</select>";
						?>
						<label for='dateofbirth'>Date of birth</label>
						<?php
						echo "<input class='editing-inputs' type='date' name='dateofbirth' value=date('Y-m-d', strtotime($bd)) id='dateofbirth' />";
						?>
					</div>
				</div>
				<img width="200px" src="rosey/img/Profile.png" />

				<div class="about-content">
					<label for="description-bio">
						<h4>Description:</h4>
					</label>
					<div style="width: 80%">
						<?php
						echo "<textarea maxlength='500' cols='120' style='max-width: 100%' rows='10' id='description-bio'  
					name='description' placeholder='Your Bio'>$bio</textarea></div>";
						?>
						<hr />
						<h4>Languages</h4>
						<!-- <div class='langcon'> -->
						<style>
							select option {
								font-size: large;

							}
						</style>
						<?php
						echo "<br>
								Choose the languages you speak! <br><br>
								<div class='language-entry' style='display:flex;align-items:center;'>
								<select name='langselect[]' multiple='multiple' style='width:50vw;height:15vw;'>
								<option value='Afrikaans'>Afrikaans</option>
								<option value='Albanian'>Albanian</option>
								<option value='Arabic'>Arabic</option>
								<option value='Armenian'>Armenian</option>
								<option value='Basque'>Basque</option>
								<option value='Bengali'>Bengali</option>
								<option value='Bulgarian'>Bulgarian</option>
								<option value='Catalan'>Catalan</option>
								<option value='Cambodian'>Cambodian</option>
								<option value='Chinese (Mandarin)'>Chinese (Mandarin)</option>
								<option value='Croatian'>Croatian</option>
								<option value='Czech'>Czech</option>
								<option value='Danish'>Danish</option>
								<option value='Dutch'>Dutch</option>
								<option value='English'>English</option>
								<option value='Estonian'>Estonian</option>
								<option value='Fiji'>Fiji</option>
								<option value='Finnish'>Finnish</option>
								<option value='French'>French</option>
								<option value='Georgian'>Georgian</option>
								<option value='German'>German</option>
								<option value='Greek'>Greek</option>
								<option value='Gujarati'>Gujarati</option>
								<option value='Hebrew'>Hebrew</option>
								<option value='Hindi'>Hindi</option>
								<option value='Hungarian'>Hungarian</option>
								<option value='Icelandic'>Icelandic</option>
								<option value='Indonesian'>Indonesian</option>
								<option value='Irish'>Irish</option>
								<option value='Italian'>Italian</option>
								<option value='Japanese'>Japanese</option>
								<option value='Javanese'>Javanese</option>
								<option value='Korean'>Korean</option>
								<option value='Latin'>Latin</option>
								<option value='Latvian'>Latvian</option>
								<option value='Lithuanian'>Lithuanian</option>
								<option value='Macedonian'>Macedonian</option>
								<option value='Malay'>Malay</option>
								<option value='Malayalam'>Malayalam</option>
								<option value='Maltese'>Maltese</option>
								<option value='Maori'>Maori</option>
								<option value='Marathi'>Marathi</option>
								<option value='Mongolian'>Mongolian</option>
								<option value='Nepali'>Nepali</option>
								<option value='Norwegian'>Norwegian</option>
								<option value='Persian'>Persian</option>
								<option value='Polish'>Polish</option>
								<option value='Portuguese'>Portuguese</option>
								<option value='Punjabi'>Punjabi</option>
								<option value='Quechua'>Quechua</option>
								<option value='Romanian'>Romanian</option>
								<option value='Russian'>Russian</option>
								<option value='Samoan'>Samoan</option>
								<option value='Serbian'>Serbian</option>
								<option value='Slovak'>Slovak</option>
								<option value='Slovenian'>Slovenian</option>
								<option value='Spanish'>Spanish</option>
								<option value='Swahili'>Swahili</option>
								<option value='Swedish'>Swedish </option>
								<option value='Tamil'>Tamil</option>
								<option value='Tatar'>Tatar</option>
								<option value='Telugu'>Telugu</option>
								<option value='Thai'>Thai</option>
								<option value='Tibetan'>Tibetan</option>
								<option value='Tonga'>Tonga</option>
								<option value='Turkish'>Turkish</option>
								<option value='Ukrainian'>Ukrainian</option>
								<option value='Urdu'>Urdu</option>
								<option value='Uzbek'>Uzbek</option>
								<option value='Vietnamese'>Vietnamese</option>
								<option value='Welsh'>Welsh</option>
								<option value='Xhosa'>Xhosa</option>

								</select>
								</div>
								<br><br>";
						// <input  type='text'id='langs' name='langs' value=$languages />
						?>

						<hr />
						<h4>Skills</h4>
						<?php
						echo "<br>
						Fill in your skills details<br><br>
						<textarea maxlength='500' cols='120' style='max-width: 80%' rows='10' type='text' id='skills' name='skills'  />$skills</textarea>
						<br><br>";
						?>
						<hr />
						<h4>Education</h4>
						<?php
						echo "<br>
						Fill in your education details <br><br>
						<textarea maxlength='500' cols='120' style='max-width: 80%' rows='10' type='text' id='degrees' name='degrees'>$edu</textarea>
						<br><br>";
						?>

						<hr />
						<h4>Experience</h4>
						<?php
						echo "<br>
						Fill in your previous job(s) experience details<br><br>
						<textarea maxlength='500' cols='120' style='max-width: 80%' rows='10' type='text' id='exp' name='exp'/>$exp</textarea>
						<br><br>";
						?>

						<hr />
						<label for="cvup">
							<h4>Upload CV</h4>
						</label>
						<br>
						<input type="file" name="cvup" id="cvup">
						<button class="expand-post" type="button" id="deletecv" onclick=deleteCV()>Delete CV</button>
						<input type="text" style="display:none;" name="cvdel" id="cvdel">
						<hr />
						<input id="savingbtn" type="submit" value="SAVE" class="expand-post savechanges">
					</div>
				</div>
			</div>
	</form>
	<script>
		function deleteCV() {
			document.querySelector("#cvdel").value += "y"
		}
	</script>

</body>

</html>