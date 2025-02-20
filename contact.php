		
<?php
include_once('database_connection.php'); 
session_start();

$I_D = $_SESSION["user_id"];
$Q = "SELECT profile_pic_user FROM users WHERE users.id_user=?";
$ST = $connect->prepare($Q);
$ST->bind_param('i', $I_D);
$ST->execute();
if ($ST->error) {
    echo "Error: " . $ST->error . "<br>";
}
$r = $ST->get_result();
$u = $r->fetch_object();
$prof_pic = ($u->profile_pic_user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="rosey/img/WITH-BG/1.png" />
<title>G-Job</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
<link href="Zineb/assets/css/theme.css" rel="stylesheet">
<link href="Zineb/styleChatBox.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Begin tracking codes here, including ShareThis/Analytics -->
    
<!-- End tracking codes here, including ShareThis/Analytics -->
</head>
<body class="layout-page">
<!-- Begin Menu Navigation
================================================== -->
<header
			class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation"
		    >
			<button
				class="navbar-toggler navbar-toggler-right"
				type="button"
				data-toggle="collapse"
				data-target="#navbarsWow"
				aria-controls="navbarsWow"
				aria-expanded="false"
				aria-label="Toggle navigation"
			>
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="container">
				<!-- Begin Logo -->
				<a class="navbar-brand" href="index.php" id="logoContainer">
					<img
						id="logo"
						class="logo"
						src="Zineb/100px.png"
						alt="Logo"
					/>
				</a>
				<!-- End Logo -->
				<!-- Begin Menu -->
				<div class="collapse navbar-collapse" id="navbarsWow">
					<!-- Begin Menu -->
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="index.php" onclick="setTypeSession('Home')">Home</a>
						</li>
						<li class="nav-item dropdown">
	                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
	                        <div class="dropdown-menu" aria-labelledby="dropdown01">
		                        <a class="dropdown-item design design_btn" id="design" href="category.php" onclick="setTypeSession('Design')">Design</a>
		                        <a class="dropdown-item it it_btn" id="it" href="category.php" onclick="setTypeSession('IT')">IT</a>
		                        <a class="dropdown-item government government_btn" id="government" href="category.php" onclick="setTypeSession('Government and Public Service')">Government and Public Service</a>
		                        <a class="dropdown-item business business_btn" id="business" href="category.php" onclick="setTypeSession('Business and Management')">Business and Management</a>
		                        <a class="dropdown-item medical medical_btn" id="medical" href="category.php" onclick="setTypeSession('Medical field')">Medical field</a>
		                        <a class="dropdown-item healthcare healthcare_btn" id="healthcare" href="category.php" onclick="setTypeSession('Healthcare')">Healthcare</a>
		                        <a class="dropdown-item education education_btn" id="education" href="category.php" onclick="setTypeSession('Education')">Education</a>
		                        <a class="dropdown-item engineering engineering_btn" id="engineering" href="category.php" onclick="setTypeSession('Engineering')">Engineering</a>
		                        <a class="dropdown-item finance finance_btn" id="finance" href="category.php" onclick="setTypeSession('Finance')">Finance</a>
		                        <a class="dropdown-item marketing marketing_btn" id="marketing" href="category.php" onclick="setTypeSession('Marketing')">Marketing</a>
		                        <a class="dropdown-item arts arts_btn" id="arts" href="category.php" onclick="setTypeSession('Arts and Entertainments')">Arts and Entrainments</a>
	                        </div>
                        </li>
						<li class="nav-item">
							<a class="nav-link" href="about.php">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.php">Contact</a>
						</li>
						<li class="nav-item dropdown">
							<a
								class="nav-link dropdown-toggle"
								href="#"
								id="dropdown01"
								data-toggle="dropdown"
								aria-haspopup="true"
								aria-expanded="false"
								>Role</a>
							<div class="dropdown-menu" aria-labelledby="dropdown01">
								<a class="dropdown-item" href="seeker.php" onclick="setTypeSession('Seeker')">Seeker</a>
								<a class="dropdown-item" href="provider.php" onclick="setTypeSession('Provider')">Provider</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="profile.php">Profile</a>
						</li>
						<li class="nav-item">
							<a href="profile.php">
								<?php
								echo "<img
								class='author-thumb'
								src=$prof_pic
								alt='Sal'
							/>"; ?>
								
							</a>
						</li>
					</ul>
					<!-- End Menu -->
				</div>
			</div>
		</header>
<!-- End Menu Navigation
================================================== -->

<!-- End Menu Navigation
================================================== -->
<div class="site-content">
	<div class="container">
		<!-- Content (replace with your e-mail address below)
    ================================================== -->
	<div class="container">
		<!-- Content (replace with your e-mail address below)
    ================================================== -->
		<div class="main-content">
			<section>
			<div class="section-title">
				<h2><span>Contact Us</span></h2>
			</div>
			<div class="article-post">
				<form action="" method="POST">
                    <input class="form-control" type="text" id="inputSubject" name="Subject" placeholder="Subject">
					<br />
                    <textarea rows="8" class="form-control mb-3" id="inputMessage" name="message" placeholder="Message"></textarea>
					<input class="btn btn-success" type="submit" value="Send" id="sendContactUs">
				</form>
			</div>
			</section>
		</div>
	</div>
	<!-- /.container -->
	<div class="B">
		<button id="showContactsButton">Show Contacts</button>
		<div id="contactsContainer" class="contacts-container">
		    <div class="contacts-header">Contacts</div>
		    <span class="close-contacts-button" id="closeContactsButton">&times;</span>
   <br />
   
   <br />
   
   <div class="table-responsive">
	<form id="addContactForm">
        <label for="firstName">Contact First Name:</label>
        <input type="text" id="firstName" name="firstName" required>
		<label for="lastName">Contact Last Name:</label>
		<input type="text" id="lastName" name="lastName" required>
        <button type="button" class="addContact">Add Contact</button>
    </form>
	<br />
   
    <div id="user_details"></div>
    <div id="user_model_details"></div>
   </div>
  </div>                

		    </div>
	    </div>	
		
	</div>
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="footer-widget">
					<a class="navbar-brand" href="index.php">
						<img class="logo" src="Zineb/logo3.png" alt="Affiliates - Free Bootstrap Template">
					   </a>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="footer-widget">
					<h5 class="title">Our Services</h5>
					<ul>
						<li><a target="_blank" href="seeker.php">Seeking Job</a></li>
						<li><a target="blank" href="provider.php">Seeking Worker</a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="footer-widget">
					<h5 class="title">Useful Links</h5>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a target="_blank" href="about.php">About Us</a></li>
						<li><a href="terms2.html">Privacy Policy</a></li>
						<li><a href="terms2.html">Terms of Service</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="footer-widget textwidget">
					<h5 class="title">G-Job</h5>
					<p>
						École Supérieure de l'Intelligence Artificielle Mahelma algeirs					
					</p>
					<p>
						Phone : +213 55 89 55 48 55
					</p>
					<p> Email:
						<a href="mailto:G-job@gmail.com" target="_blank">gjobalgeria@gmail.com</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</footer>
	<!-- End Footer
    ================================================== -->

<!-- JavaScript
================================================== -->
<script>
$(document).ready(function(){

fetch_user();

setInterval(function(){
 update_last_activity();
 fetch_user();
 update_chat_history_data();
}, 5000);

function fetch_user()
{
 $.ajax({
  url:"fetch_user.php",
  method:"POST",
  success:function(data){
   $('#user_details').html(data);
  }
 })
}

function update_last_activity()
{
 $.ajax({
  url:"update_last_activity.php",
  success:function()
  {

  }
 })
}

function make_chat_dialog_box(to_user_id, to_user_name)
{
var modal_content = '<div id="user_dialog_' + to_user_id + '" class="user_dialog" title="Chat with ' + to_user_name + '">';
modal_content += '<div class="chat_header" style="background-color: #61677A; color: #fff; padding: 10px; text-align: center;">';
modal_content += to_user_name;
modal_content += '</div>';
modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">'; 
 modal_content += fetch_user_chat_history(to_user_id);
 modal_content += '</div>';
 modal_content += '<div class="form-group">';
 modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
 modal_content += '</div><div class="form-group" align="right">';
 modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
 $('#user_model_details').html(modal_content);
}

$(document).on('click', '.start_chat', function(){
 var to_user_id = $(this).data('touserid');
 var to_user_name = $(this).data('tousername');
 make_chat_dialog_box(to_user_id, to_user_name);
 $("#user_dialog_"+to_user_id).dialog({
  autoOpen:false,
  width:400
 });
 $('#user_dialog_'+to_user_id).dialog('open');
});

$(document).on('click', '.addContact', function(){
    // Get the entered name from the input field
    var firstName = $('#firstName').val();
    var lastName = $('#lastName').val();

    // Check if the name is not empty
    if (firstName.trim() !== '' && lastName.trim() !== '') {
        $.ajax({
            url: "addContact.php",
            method: "POST",
            data: {firstName: firstName, lastName: lastName},
            success: function(data) {
                // Handle success, you can update the UI or take further actions if needed

                // Clear the input field
                $('#firstName').val('');
				$('#lastName').val('');
            },
            error: function(xhr, status, error) {
                // Handle error, if any
                console.error(error);
            }
        });
    } else {
        // Notify the user that the name is required or handle the case accordingly
        alert('Please enter a contact name.');
    }
});

$(document).on('click', '.send_chat', function(){
 var to_user_id = $(this).attr('id');
 var chat_message = $('#chat_message_'+to_user_id).val();
 $.ajax({
  url:"insert_chat.php",
  method:"POST",
  data: {to_user_id: to_user_id, chat_message_content: chat_message},
  success:function(data)
  {
   $('#chat_message_'+to_user_id).val('');
   $('#chat_history_'+to_user_id).html(data);
  }
 })
});

function fetch_user_chat_history(to_user_id)
{
 $.ajax({
  url:"fetch_user_chat_history.php",
  method:"POST",
  data:{to_user_id:to_user_id},
  success:function(data){
   $('#chat_history_'+to_user_id).html(data);
  }
 })
}

function update_chat_history_data()
{
 $('.chat_history').each(function(){
  var to_user_id = $(this).data('touserid');
  fetch_user_chat_history(to_user_id);
 });
}

$(document).on('click', '.ui-button-icon', function(){
 $('.user_dialog').dialog('destroy').remove();
});
 
var myButton = document.getElementById('sendContactUs');

myButton.addEventListener('click', function(event) {
    // Prevent the default form submission
    event.preventDefault();

    // Get the value of the input field
    var getSubject = document.querySelector('#inputSubject').value;

    // Get the value of the textarea
    var getMessage = document.querySelector('#inputMessage').value;

    if (!getMessage.trim()) {
        alert('Message empty!');
    } else {
        // Your AJAX code here
        $.ajax({
            url: "add_contact_us.php",
            method: "POST",
            data: { subject: getSubject, message: getMessage },
            success: function() {
                // Clear the input fields
                document.querySelector('#inputSubject').value = "";
                document.querySelector('#inputMessage').value = "";
                alert('Message sent');
            }
        });
    }
});


});
</script>
<script src="Zineb/assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="Zineb/assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="Zineb/assets/js/masonry.pkgd.min.js"></script>
<script src="Zineb/chatBox.js"></script>

</body>
</html>