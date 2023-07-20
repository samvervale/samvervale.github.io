<?php include('server.php');
if (isset($_SESSION["Username"])) {
	$username = $_SESSION["Username"];
	if ($_SESSION["Usertype"] == 1) {
		$linkPro = "freelancerProfile.php";
		$linkEditPro = "editFreelancer.php";
		$linkBtn = "applyJob.php";
		$textBtn = "Apply for this job";
	} else {
		$linkPro = "employerProfile.php";
		$linkEditPro = "editEmployer.php";
		$linkBtn = "editJob.php";
		$textBtn = "Edit the job offer";
	}
} else {
	$username = "";
	//header("location: index.php");
}

if (isset($_POST["e_user"])) {
	$_SESSION["e_user"] = $_POST["e_user"];
	header("location: viewEmployer.php");
}

$sql = "SELECT * FROM employer";
$result = $conn->query($sql);

if (isset($_POST["s_username"])) {
	$t = $_POST["s_username"];
	$sql = "SELECT * FROM employer WHERE username='$t'";
	$result = $conn->query($sql);
}

if (isset($_POST["s_name"])) {
	$t = $_POST["s_name"];
	$sql = "SELECT * FROM employer WHERE Name='$t'";
	$result = $conn->query($sql);
}

if (isset($_POST["s_email"])) {
	$t = $_POST["s_email"];
	$sql = "SELECT * FROM employer WHERE email='$t'";
	$result = $conn->query($sql);
}

?>



<!DOCTYPE html>
<html>

<head>
	<title>All Employer</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="awesome/css/fontawesome-all.min.css">

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
							<a href="<?php echo $linkPro; ?>" class="list-group-item"><span class="glyphicon glyphicon-home"></span> View profile</a>
							<a href="<?php echo $linkEditPro; ?>" class="list-group-item"><span class="glyphicon glyphicon-inbox"></span> Edit Profile</a>
							<a href="message.php" class="list-group-item"><span class="glyphicon glyphicon-envelope"></span> Messages</a>
							<a href="logout.php" class="list-group-item"><span class="glyphicon glyphicon-ok"></span> Logout</a>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!--End Navbar menu-->


	<!--main body-->
	<div style="padding:1% 3% 1% 3%;">
		<div class="row">

			<!--Column 1-->
			<div class="col-lg-9">

				<!--Freelancer Profile Details-->
				<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3>All Employer</h3>
						</div>
						<div class="panel-body">
							<h4>
									<?php
									if ($result->num_rows > 0) {
										// output data of each row
										while ($row = $result->fetch_assoc()) {
											$e_username = $row["username"];
											$Name = $row["Name"];
											$email = $row["email"];
											$company = $row["company"];
											$contact_no = $row["contact_no"];

											echo '
                                <form action="allEmployer.php" method="post">
                                <input type="hidden" name="e_user" value="' . $e_username . '">
									<div class="col-md-6 col-lg-3">
										<div class="single_candidates text-center">
											<div class="thumb">
												<img src="image/company.png" alt="" width="100" height="100">
											</div>
											<a href=""><input type="submit" class="btn btn-link btn-lg" value="'.$Name.'"></a><br>
											<p3>Email: '.$email.'</p3><br>
											<p3>Company: '.$company.'</p3><br>'.$contact_no.'<br><br><br><br><br>
										</div>
									</div>
                                </form>
                                ';
										}
									} else {
										echo "<tr></tr><tr><td></td><td>Nothing to show</td></tr>";
									}

									?>
							</h4>
						</div>
					</div>
					<p></p>
				</div>
				<!--End Freelancer Profile Details-->

			</div>
			<!--End Column 1-->


			<!--Column 2-->
			<div class="col-lg-3">

				<!--Main profile card-->
				<div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
					<p></p>
					<form action="allEmployer.php" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="s_username">
							<center><button type="submit" class="btn btn-info">Search by username</button></center>
						</div>
					</form>

					<form action="allEmployer.php" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="s_name">
							<center><button type="submit" class="btn btn-info">Search by Name</button></center>
						</div>
					</form>

					<form action="allEmployer.php" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="s_email">
							<center><button type="submit" class="btn btn-info">Search by Email</button></center>
						</div>
					</form>

					<p></p>
				</div>
				<!--End Main profile card-->

			</div>
			<!--End Column 2-->

		</div>
	</div>
	<!--End main body-->


	<!--Footer-->
	<div class="text-center" style="padding:4%;background:#222;color:#fff;margin-top:20px;">
		<div class="row">
			<div class="col-lg-3">
				<h3 style="color: #F4F2DE;">Quick Links</h3>
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