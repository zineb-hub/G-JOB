<?php
    $conn = require "database.php";
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Retrieve data from the database
    $sql = "SELECT * FROM website";
    $result = $connect->query($sql);

    $row = $result->fetch_assoc();

    // $picture = $row["logo"];
    $logo = $row["name"];
    // echo "$picture";
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="icon" href="rosey/img/WITH-BG/1.png" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet" />
    <link href="Zineb/assets/css/theme.css" rel="stylesheet" />

    <title>Document</title>
</head>

<body>
   
    <header class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsWow" aria-controls="navbarsWow" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <!-- Begin Logo -->
            <a class="navbar-brand" href="index.html">
                <?php
                echo "<img " .
                    "class='logo' " .
                    "src='' " .
                    "alt=$logo" .
                    "/>";
                ?>

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
								<img
									class="author-thumb"
									src="displaypfp.php"
									alt="Sal"
								/>
							</a>
						</li>
					</ul>
					<!-- End Menu -->
				</div>
        </div>
    </header>
</body>

<script>
		window.onload = function() {

let design_btn = document.querySelector('.design_btn');
let it_btn = document.querySelector('.it_btn');
let design_posts = document.querySelectorAll('.design');
let it_posts = document.querySelectorAll('.it');
let all_posts = document.querySelectorAll('.post');
 
design_btn.addEventListener('click', () => {
	hideall();
	design_posts.forEach((post) => {
		post.style.display = 'block';
	});
});
it_btn.addEventListener('click', () => {
	hideall();
	it_posts.forEach((post) => {
		post.style.display = 'block';
	});
});

 function hideall() {
	all_posts.forEach((post) => {
		post.style.display = 'none';
	});
}
};
</script>
    
</html>