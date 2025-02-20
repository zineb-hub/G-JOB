<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="rosey/img/WITH-BG/1.png" />
		<link rel="stylesheet" href="./rosey/css/GuestNavBar.css" />
		<link rel="stylesheet" href="imane/signup1.css" />
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
	</head>

	<body>
		<div class="nav_bar">
			<a href="home.html"
				><img class="logo" src="rosey\img\WITHOUT-BG\4.png"
			/></a>
			<a
				style="position: fixed; left: 10px; justify-self: flex-start"
				href="home.html"
				><img class="logo-alt" src="rosey\img/WITHOUT-BG/3.png"
			/></a>
			<button class="nav_buttons home">
				<a href="home.html">Home</a>
			</button>
			<button class="nav_buttons"><a href="home.html">About</a></button>
			<button class="nav_buttons">
				<a href="home.html"></a>Services
			</button>
			<button class="nav_buttons"><a href="home.html"></a>Team</button>
			<button class="nav_buttons">
				<a href="home.php">Contact</a>
			</button>
			<button class="nav_buttons">
				<a href="home.php">Description</a>
			</button>
			<button class="nav_buttons login">
				<a href="log_in.html">Login</a>
			</button>
			<button class="nav_buttons signup">
				<a href="signup1.html">Sign Up</a>
			</button>
			<button class="nav_FAQ">
				<a href="faq.html">
					<img class="faq" />
				</a>
			</button>
			<button class="sidebar">&#8801;</button>
			<div class="sidebar-content">
				<button class="nav_buttons exit">x</button>
				<button class="nav_buttons home">
					<a href="home.html">Home</a>
				</button>
				<hr />
				<button class="nav_buttons">
					<a href="home.html">About</a>
				</button>
				<hr />
				<button class="nav_buttons">
					<a href="home.html"></a>Services
				</button>
				<hr />
				<button class="nav_buttons">
					<a href="home.html"></a>Team
				</button>
				<hr />
				<button class="nav_buttons">
					<a href="home.html">Contact</a>
				</button>
				<hr />
				<button class="nav_buttons">
					<a href="home.html">Description</a>
				</button>
				<hr />
				<button class="nav_buttons login">
					<a href="log_in.html">Login</a>
				</button>
				<hr />
				<button class="nav_buttons signup">
					<a href="signup1.html">Sign Up</a>
				</button>
				<hr/>
				<button class="nav_buttons">
					<a href="faq.html">Help And Support</a>
				</button>
			</div>
		</div>
		<div class="signup-page">
			<div id="header">
				<h1 id="heading">Get Started!</h1>
				<p id="sign-description">
					Welcome to G-Jobs! 
					Sign up now to unlock a world of opportunities.
				</p>
			</div>
			<div class="illustration">
				<img
					id="actual-illustration"
					src="imane/pics/Job hunt-amico dark version.png"
					alt=""
				/>
			</div>
			<div class="whole-thing">
				<div class="ancestor">
					<div class="sign-up">

						<form action="process_signup.php" method="POST" id=signup nonvalidate >
							<label for="fname">First name</label>
							<input
								size="40"
								class="sign-input"
								type="text"
								name="fname"
								required
							/>
							<label for="lname">Last name</label>
							<input
								size="40"
								class="sign-input"
								type="text"
								name="lname"
								required
							/>
							<label for="mail">E-mail</label>
							<input
								size="60"
								class="sign-input"
								type="text"
								name="mail"
								required
							/>
							<label for="pword">Password</label>
							<input
								size="20"
								class="sign-input"
								type="password"
								name="pword"
								required
							/>
							<label for="pwordc">Password confirmation</label>
							<input
								id="pwdc"
								size="20"
								class="sign-input"
								type="password"
								name="pwordc"
								required
							/>
							<label for="terms">
								<input
									id="terms-conditions"
									type="checkbox"
									name="terms"
									required
								/>
								<p id="terms-n-conditions">
									I have read and understood
									<a href="terms.html" id="link-terms"
										>the terms and conditions</a
									>
									of the website.
								</p>
							</label>
							<button type="submit" id="next">
								<a style="color: black"
									>Sign up</a
								>
							</button>
							<a class="existing-acc" href="log_in.php"
								>I already have an account</a
							>
						</form>
					</div>
				</div>
			</div>
		</div>
		<script src="rosey/js/sidebar.js"></script>
	</body>
</html>
