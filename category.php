<?php 
include('database_connection.php'); 
session_start();
include_once("database_connection2.php");
$I_D = $_SESSION["user_id"];
$Q = "SELECT profile_pic_user FROM users WHERE users.id_user=?";
$ST = $connect->prepare($Q);
$ST->bind_param('i', $I_D);
$ST->execute();
if ($ST->error) {
    echo "Error: " . $ST->error . "<br>";
}
$result = $ST->get_result();
$user = $result->fetch_object();
$prof_pic = ($user->profile_pic_user);
?>


<!DOCTYPE html>
<html lang="en">
	<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



		<meta charset="utf-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
		/>
		<link rel="icon" href="rosey/img/WITH-BG/1.png" />
		<title>G-Job</title>
		<link
			rel="stylesheet"
			href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
			integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
			crossorigin="anonymous"
		/>
		<link
			href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
			rel="stylesheet"
		/>
		<link
			href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i"
			rel="stylesheet"
		/>
		<link href="Zineb/assets/css/theme.css" rel="stylesheet" />

		<!-- Begin tracking codes here, including ShareThis/Analytics -->

		<!-- End tracking codes here, including ShareThis/Analytics -->
	</head>
	<body class="layout-default">
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
		<a class="dropdown-item design design_btn" id="design" onclick="setTypeSession('Design')">Design</a>
		<a class="dropdown-item it it_btn" id="it"  onclick="setTypeSession('IT')">IT</a>
		<a class="dropdown-item government government_btn" id="government"  onclick="setTypeSession('Government and Public Service')">Government and Public Service</a>
		<a class="dropdown-item business business_btn" id="business" onclick="setTypeSession('Business and Management')">Business and Management</a>
		<a class="dropdown-item medical medical_btn" id="medical"  onclick="setTypeSession('Medical field')">Medical field</a>
		<a class="dropdown-item healthcare healthcare_btn" id="healthcare" onclick="setTypeSession('Healthcare')">Healthcare</a>
		<a class="dropdown-item education education_btn" id="education" onclick="setTypeSession('Education')">Education</a>
		<a class="dropdown-item engineering engineering_btn" id="engineering" onclick="setTypeSession('Engineering')">Engineering</a>
		<a class="dropdown-item finance finance_btn" id="finance" onclick="setTypeSession('Finance')">Finance</a>
		<a class="dropdown-item marketing marketing_btn" id="marketing" onclick="setTypeSession('Marketing')">Marketing</a>
		<a class="dropdown-item arts arts_btn" id="arts" onclick="setTypeSession('Arts and Entrainments')">Arts and Entrainments</a>
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

		<div class="site-content">
			<div class="container">
				<div class="main-content">
					<!-- Category Archive
            ================================================== -->
					<section class="recent-posts row">
						<div class="col-sm-4">
							<div class="sidebar">
								<div class="sidebar-section">
									<div class="sidebar-section">
										<h5><span>GJob</span></h5>
										<img src="Zineb/1.png" alt="GJob" />
									</div>
									<h5><span>GJob</span></h5>
									<ul style="list-style: none">
										<li>
											<a
												target="_blank"
												href="https://stackoverflow.com"
												>Stack Overflow</a
											>
										</li>
										<li>
											<a
												target="_blank"
												href="https://github.com"
												>GitHub</a
											>
										</li>
										<li>
											<a
												target="_blank"
												href="https://www.codecademy.com"
												>Codecademy</a
											>
										</li>
										<li>
											<a
												target="_blank"
												href="https://www.w3schools.com"
												>W3Schools</a
											>
										</li>
										<li>
											<a
												target="_blank"
												href="https://techcrunch.com"
												>TechCrunch</a
											>
										</li>
									</ul>
								</div>
								<div class="sidebar-section">
									<h5><span>made by Algerians <3 </span></h5>
									<a
										href="https://stackoverflow.com"
										title="Algeria flag"
										><img
											src="https://images.emojiterra.com/twitter/v13.1/512px/1f1e9-1f1ff.png"
											alt="Algeria flag"
									/></a>
								</div>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="section-title">
								<h2><span>It Interests</span></h2>
							</div>
							<div class="masonrygrid row listrecent">
								<!-- begin post -->
								<div class="col-md-6 grid-item">
									<div class="card">
										<a href="single.html">
											<img
												class="img-fluid"
												src="https://builtin.com/sites/www.builtin.com/files/styles/og/public/software-engineer-vs-programmer00.jpg"
												alt="Tree of Codes"
											/>
										</a>
										<div class="card-block">
											<h2 class="card-title">
												<a href="provpost.html"
													>Seeking It Developer</a
												>
											</h2>
											<h4 class="card-text">
												Future company, We are seeking a
												talented IT Developer to join
												our team and contribute to our
												mission of developing
												exceptional software and
												applications...
											</h4>
											<div class="metafooter">
												<div class="wrapfooter">
													<span
														class="meta-footer-thumb"
													>
														<img
															class="author-thumb"
															src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&q=80&w=1000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8cHJvZmVzc2lvbmFsfGVufDB8fDB8fHww"
															alt="Sal"
														/>
													</span>
													<span class="author-meta">
														<span class="post-name"
															><a
																target="_blank"
																href="#"
																>Nour</a
															></span
														><br />
														<span class="post-date"
															>17 juin 2023</span
														>
													</span>
													<span class="post-read-more"
														><a
															href="single.html"
															title="Read Story"
															><i
																class="fa fa-link"
															></i></a
													></span>
													<div class="clearfix"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- end post -->
							</div>
							<!-- Pagination -->
						</div>
					</section>
				</div>
			</div>
			<!-- /.container -->
			<!-- Before Footer

    ================================================== -->
			<footer class="footer">
				<div class="container">
					<div class="row">
						<div class="col-sm-3">
							<div class="footer-widget">
								<a class="navbar-brand" href="index.php">
									<img
										class="logo"
										src="Zineb/logo3.png"
										alt="Affiliates - Free Bootstrap Template"
									/>
								</a>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="footer-widget">
								<h5 class="title">Our Services</h5>
								<ul>
									<li>
										<a target="_blank" href="seeker.php"
											>Seeking Job</a
										>
									</li>
									<li>
										<a target="blank" href="provider.php"
											>Seeking Worker</a
										>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="footer-widget">
								<h5 class="title">Useful Links</h5>
								<ul>
									<li><a href="index.php">Home</a></li>
									<li>
										<a target="_blank" href="about.php"
											>About Us</a
										>
									</li>
									<li>
										<a href="terms2.html">Privacy Policy</a>
									</li>
									<li>
										<a href="terms2.html"
											>Terms of Service</a
										>
									</li>
									<li><a href="contact.php">Contact</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="footer-widget textwidget">
								<h5 class="title">G-Job</h5>
								<p>
									École Supérieure de l'Intelligence
									Artificielle Mahelma algeirs
								</p>
								<p>Phone : +213 55 89 55 48 55</p>
								<p>
									Email:
									<a
										href="mailto:G-job@gmail.com"
										target="_blank"
										>gjobalgeria@gmail.com</a
									>
								</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- End Footer
    ================================================== -->
		</div>
<script>
$(document).ready(function(){
	fetch_posts();

setInterval(function(){
	add_posts();
}, 5000);


});
</script>
		<!-- JavaScript
================================================== -->
		<script src="Zineb/assets/js/jquery.min.js"></script>
		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
			integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
			crossorigin="anonymous"
		></script>
		<script
			src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
			integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
			crossorigin="anonymous"
		></script>
		<script src="Zineb/assets/js/ie10-viewport-bug-workaround.js"></script>
		<script src="Zineb/assets/js/masonry.pkgd.min.js"></script>
	</body>
</html>
