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
			<div class="nav_bar">
				<a href="home.html"
					><img class="logo" src="rosey\img\WITHOUT-BG\4.png"
				/></a>
				<a
					style="
						position: fixed;
						left: 10px;
						justify-self: flex-start;
					"
					href="home.html"
					><img class="logo-alt" src="rosey\img/WITHOUT-BG/3.png"
				/></a>

				<button class="nav_buttons dashboard">
					<a href="home.html">home</a>
				</button>
				<div class="notifchatdrop">
					<button class="notif nav_buttons">
						<img
							id="notifs"
							class="notif-icon"
							src="imane/pics/notif.png"
						/>
					</button>
					<div class="notifs-content">
						<h2>Notifications:</h2>
						<div class="notif-element">
							<h1><a href="seekpost.html">Notif title</a></h1>
							<p>notif content : you got a comment!</p>
						</div>
						<div class="notif-element">
							<h1><a href="provpost.html">Notif title</a></h1>
							<p>notif content : you got a like!</p>
						</div>
						<div class="notif-element">
							<h1><a href="home.html">Notif title</a></h1>
							<p>
								notif content : "provider1" has sent you a
								message!
							</p>
						</div>
					</div>

					<button class="nav_buttons main-dropdown">
						<img
							id="dropdown-img"
							class="dropdown-img"
							src="https://i.pinimg.com/564x/20/c0/0f/20c00f0f135c950096a54b7b465e45cc.jpg"
						/>
					</button>
					<div class="dropdown-content">
						<a class="ddlinks" href="profile.html">Profile<br /></a>
						<hr />
						<a class="ddlinks" href="provform.html"
							>Post an offer<br
						/></a>
						<hr />

						<a class="ddlinks" href="seekform.html"
							>Post an application<br
						/></a>
						<hr />
						<a class="ddlinks" href="faq.html"
							>Help And Support<br
						/></a>

						<hr />
						<a class="ddlinks" href="settings.html"
							>Settings<br
						/></a>
						<hr />

						<a class="ddlinks" href="home.html">Log out<br /></a>
					</div>
				</div>
				<button class="sidebar">&#8801;</button>
				<div class="sidebar-content">
					<button class="nav_buttons exit">x</button>
					<button class="nav_buttons dashboard">
						<a href="home.html">Dashboard</a>
					</button>

					<hr />
					<a href="profile.html">Profile</a>
					<hr />
					<a href="provform.html">Post an offer</a>
					<hr />

					<a href="seekform.html">Post an application</a>
					<hr />
					<a href="faq.html">Help And Support</a>

					<hr />
					<a href="settings.html">Settings</a>
					<hr />

					<a href="home.html">Log out</a>
				</div>
			</div>

			<div id="main-page">
				<div id="search">
					<div id="addition">
						<div id="header">
							<h1>FAQ</h1>
							<p>Frequently Asked Questions</p>
						</div>
						<input
							id="search-bar"
							type="text"
							placeholder="search"
						/>
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
</html>
