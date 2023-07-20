<?php include('server.php');
if (isset($_SESSION["Username"])) {
	$username = $_SESSION["Username"];
} else {
	$username = "";
	//header("location: index.php");
}

if (isset($_SESSION["c_letter"])) {
	$c_letter = $_SESSION["c_letter"];
}


?>

<!DOCTYPE html>
<html>

<head>
	<title>Cover Letter</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="awesome/css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrapValidator.css">

	<style>
		body {
			padding-top: 3%;
			margin: 0;
		}

		.card {
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			background: #fff
		}
	</style>

</head>

<body>

	<!--Navbar menu-->
	<nav class="navbar navbar-fixed-top" id="my-navbar" style="background-color: #7C9D96;">
		<div class="container">
			<div class="navber-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand" style="color: #F4F2DE;">Freelance Marketplace</a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="allJob.php" style="color: #F4F2DE;">Browse all jobs</a></li>
					<li><a href="allFreelancer.php" style="color: #F4F2DE;">Browse Freelancers</a></li>
					<li><a href="allEmployer.php" style="color: #F4F2DE;">Browse Employers</a></li>
					<li class="dropdown" style="background:#000;padding:0 20px 0 20px;">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $username; ?>
						</a>
						<ul class="dropdown-menu list-group list-group-item-info">
							<a href="employerProfile.php" class="list-group-item"><span class="glyphicon glyphicon-home"></span> View profile</a>
							<a href="editEmployer.php" class="list-group-item"><span class="glyphicon glyphicon-inbox"></span> Edit Profile</a>
							<a href="message.php" class="list-group-item"><span class="glyphicon glyphicon-envelope"></span> Messages</a>
							<a href="logout.php" class="list-group-item"><span class="glyphicon glyphicon-ok"></span> Logout</a>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--End Navbar menu-->


	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="page-header">
					<h2>Cover Letter</h2>
				</div>
				<div class="page-header">
					<h4><?php echo nl2br($c_letter); ?></h4>
				</div>
			</div>
		</div>
	</div>


	<!--Footer-->
	<div class="text-center" style="padding:4%;background:#222;color:#fff;margin-top:20px;">
		<div class="row">
			<div class="col-lg-3">
				<h3 style="color: #F4F2DE;">Quick Links</h3>
				<p><a href="allEmployer.php" style="color: #F4F2DE;">Browse Employers</a></p>
				<p><a href="index.php" style="color: #E9B384;">Home</a></p>
				<p><a href="allJob.php" style="color: #E9B384;">Browse all jobs</a></p>
				<p><a href="allFreelancer.php" style="color: #E9B384;">Browse Freelancers</a></p>
				<p><a href="allEmployer.php" style="color: #E9B384;">Browse Employers</a></p>
			</div>
			<div class="col-lg-3">
				<h3 style="color: #F4F2DE;">About Us</h3>
				<p style="color: #E9B384;">Rahamat-E-Elahi, CUET ID-1304054</p>
				<p style="color: #E9B384;">Shovagata Sarker Borno, CUET ID-1304041</p>
				<p style="color: #E9B384;">Md. Sharifullah, CUET ID-1304049</p>
				<p style="color: #E9B384;">&copy 2018</p>
			</div>
			<div class="col-lg-3">
				<h3 style="color: #F4F2DE;">Contact Us</h3>
				<p style="color: #E9B384;">Chittagong University of Engineering and Technology</p>
				<p style="color: #E9B384;">Chittagong, Bangladesh</p>
				<p style="color: #E9B384;">&copy CUET 2018</p>
			</div>
			<div class="col-lg-3">
				<h3 style="color: #F4F2DE;">Social Contact</h3>
				<p style="font-size:20px;color:#3B579D;"><i class="fab fa-facebook-square"> Facebook</i></p>
				<p style="font-size:20px;color:#D34438;"><i class="fab fa-google-plus-square"> Google</i></p>
				<p style="font-size:20px;color:#2CAAE1;"><i class="fab fa-twitter-square"> Twitter</i></p>
				<p style="font-size:20px;color:#0274B3;"><i class="fab fa-linkedin"> Linkedin</i></p>
			</div>
		</div>
	</div>
	<!--End Footer-->


	<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>