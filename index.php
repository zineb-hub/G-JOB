<?php 
include('database_connection.php'); 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


		<link rel="icon" href="rosey/img/WITH-BG/1.png" />
		<meta charset="utf-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
		/>
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
				<form action="otherviewprofile.php" method="POST" style="display: flex; align-items: center;" id="myForm">
                    <input class="form-control" type="text" id="Subject" name="Subject" placeholder="Search Profile" style="background-color: #ccc; width: 250px;">
                </form>
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
		<div class="site-content">
			<!-- Home Jumbotron
    ================================================== -->
			<section class="intro">
				<div class="wrapintro">
					<h1>G-Jobs</h1>
					<h2 class="lead">
						Get in touch with your Field of Interest.
					</h2>
				</div>
			</section>

			<!-- Featured
================================================== -->
            <div class="container">
				<div class="main-content">
					<!-- Featured
              ================================================== -->
					<section class="featured-posts">
						<div class="section-title">
							<h2><span>Featured</span></h2>
						</div>
						<div class="row listfeaturedtag">
							<!-- begin post -->
							<div class="col-sm-6">
								<div class="card">
									<div class="row">
										<div class="col-md-5 wrapthumbnail">
											<a href="provpost.html">
												<div
													class="thumbnail"
													style="
														background-image: url(https://cdn.mos.cms.futurecdn.net/7phG3EdttksyQzRjgqT4ym-1200-80.jpg);
													"
												></div>
											</a>
										</div>
										<div class="col-md-7">
											<div class="card-block">
												<h2 class="card-title">
													<a href="provpost.html">
														Seeking Model</a
													>
												</h2>
												<h4 class="card-text">
													We are seeking a talented
													and versatile model to join
													our team for exciting
													opportunities in the fashion
													and editorial industry. As a
													model with SFashion.
												</h4>
												<div class="metafooter">
													<div class="wrapfooter">
														<span
															class="meta-footer-thumb"
														>
															<img
																class="author-thumb"
																src="https://i.pinimg.com/736x/31/04/a4/3104a42834fbca5fb69882f4c1f88a2b.jpg"
																alt="Sal"
															/>
														</span>
														<span
															class="author-meta"
														>
															<span
																class="post-name"
																><a
																	target="_blank"
																	href="otherviewprofile.html"
																	>Zineb</a
																></span
															><br />
															<span
																class="post-date"
																>28 Oct
																2023</span
															>
														</span>
														<span
															class="post-read-more"
															><a
																href="otherviewprofile.html"
																title="Read Story"
																><i
																	class="fa fa-link"
																></i></a
														></span>
														<div
															class="clearfix"
														></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- end post -->
						</div>
					</section>
					<!-- Posts Index
             ================================================== -->
					<div class="col-sm-14">
						<div class="section-title">
							<h2><span>All Posts</span></h2>
						</div>
						<div class="masonrygrid row listrecent">
							<!-- begin post -->
							<!-- end post -->

						</div>
					</div>
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

		<!-- JavaScript
================================================== -->

<script>  
$(document).ready(function(){
 setTypeSession('Home')
 fetch_posts();
 add_featured_posts();

 setInterval(function(){
	add_featured_posts();
    add_posts();
 }, 10000);

});
</script>

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
