<!DOCTYPE html>
<html>
	<head>
		<meta
			charset="UTF-8"
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<link rel="icon" href="rosey/img/WITH-BG/1.png" />
		<link rel="stylesheet" href="rosey/css/UserNavBar.css" />
		<link rel="stylesheet" href="imane/faq.css" />
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Gabarito:wght@400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
	</head>

	<body>
		<div id="main-div">
			<?php include "navbarrosey.php" ?>

			<div id="main-page">
				<div id="search">
					<div id="addition">
						<div id="header">
							<h1>Testimonials</h1>
							<p>your opinion is very wortly for us </p>
						</div>
						<form action="faq_insert.php" method="post">
						<input
							id="search-bar"
							type="text"
							name="content"
							placeholder="tell us your opinion"
						/>
						<input type="submit" id="submit">
						</form>
					</div>
				</div>
				<div id="question-section">
					<div id="illustration">
						<img
							id="qst-illustration"
							src="imane/pics/Questions-pana.png"
							alt=""
						/>
					</div>
					<div id="actual-questions">
						<div class="question">
							<button>
								<span class="qst">
									How do I post a job listing on your
									website?</span
								>
								<i class="fas fa-chevron-down d-arrow"></i>
							</button>
							<p>
								To post a job listing, you need to create an
								account or log in if you already have one. After
								logging in, click on the "Post a Job" button and
								fill out the necessary details about the job,
								including the job title, description, location,
								and other relevant information.
							</p>
						</div>

						<div class="question">
							<button>
								<span class="qst"
									>Are there any tips for creating an
									effective job listing?</span
								>
								<i class="fas fa-chevron-down d-arrow"></i>
							</button>
							<p>
								Yes, we recommend providing a clear job title, a
								detailed job description, specific
								qualifications and requirements, and information
								about your company. A well-crafted job listing
								can attract more qualified applicants.
							</p>
						</div>

						<div class="question">
							<button>
								<span class="qst"
									>Is there a fee for posting job
									listings?</span
								>
								<i class="fas fa-chevron-down d-arrow"></i>
							</button>
							<p>
								Posting job listings for employers is typically
								a paid service. Please check our pricing page
								for details on the pricing options available.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="imane/faq.js"></script>
		<script src="rosey/js/navbar.js"></script>
		<script src="rosey/js/sidebar.js"></script>
	</body>

	<style>
		#search-bar{
			width : 100%;
			height : 100%;
		}
		#submit{
			margin-left:70%;
			margin-top : 5%;
			width : 45%;
			height : 35%;
			border-radius: 20%;
			background-color: white;
		}
	</style>
</html>


