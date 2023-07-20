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

if (isset($_POST["jid"])) {
	$_SESSION["job_id"] = $_POST["jid"];
	header("location: jobDetails.php");
}

// $sql = "SELECT * FROM job_offer WHERE valid=1 and budget=900 ORDER BY timestamp DESC";
$sql = "SELECT * FROM job_offer WHERE valid=1 ORDER BY timestamp DESC";
$result = $conn->query($sql);

if (isset($_POST["s_title"])) {
	$t = $_POST["s_title"];
	$sql = "SELECT * FROM job_offer WHERE title='$t' and valid=1";
	$result = $conn->query($sql);
}

if (isset($_POST["s_type"])) {
	$t = $_POST["s_type"];
	$sql = "SELECT * FROM job_offer WHERE type='$t' and valid=1";
	$result = $conn->query($sql);
}

if (isset($_POST["s_employer"])) {
	$t = $_POST["s_employer"];
	$sql = "SELECT * FROM job_offer WHERE e_username='$t' and valid=1";
	$result = $conn->query($sql);
}

if (isset($_POST["s_id"])) {
	$t = $_POST["s_id"];
	$sql = "SELECT * FROM job_offer WHERE job_id='$t' and valid=1";
	$result = $conn->query($sql);
}

if (isset($_POST["recentJob"])) {
	$sql = "SELECT * FROM job_offer WHERE valid=1 ORDER BY timestamp DESC";
	$result = $conn->query($sql);
}

if (isset($_POST["oldJob"])) {
	$sql = "SELECT * FROM job_offer WHERE valid=1";
	$result = $conn->query($sql);
}

?>



<!DOCTYPE html>
<html>

<head>
	<title>All Job Offers</title>
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
		article.job-card {
  display: grid;
  grid-template-columns: 80px auto 100px;
  grid-template-rows: 35px 10px 35px;
  width: 870px;
  position: relative;
  border-top: 1px solid #e3e3e3;
  border-bottom: 1px solid #e3e3e3;
  font-family: 'Helvetica';
  padding: 24px;
}

article.job-card:hover,
article.job-card:focus {
  background-color: rgba(0,166,194,.03);
    border-color: #b2e4ec;
}

.company-logo-img {
  grid-area: 1 / 1 / 2 / 2;
  background-color: #fff;
  border: 1px solid #e3e3e3;
  height: 80px;
  width: 80px;
  box-sizing: border-box;
  position: relative;
  padding: 5px;
}

.company-logo-img img {
  max-height: calc(100% - 10px);
  max-width: calc(100% - 10px);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.job-title {
  grid-area: 1 / 2 / 2 / 3;
  font-size: 16px;
  align-self: start;
  font-weight: 500;
  margin-top: 5px;
  padding: 0 24px;
}

.company-name {
  grid-area: 2 / 2 / 3 / 3;
  align-self: center;
  font-size: 14px;
  color: #777;
  margin-bottom: 5px;
  padding: 0 24px;
}

.skills-container {
  grid-area: 3 / 2 / 4 / 3;
  align-self: center;
  padding-top: 10px;
  padding: 0 24px;
}

.skill {
  display: inline;
  color: #00a6c2;
  border-radius: 2px;
  background-color: rgba(0,166,194,.05);
  border: 1px solid rgba(0,166,194,.15);
  padding: 5px 8px;
  font-size: 12px;
}

button {
  display: block;
  width: 100%;
  cursor: pointer;
  border: 0;
  border-radius: 4px;
  font-size: 14px;
  padding: 6px 12px;
  z-index: 2;
}
.apply {
  grid-area: 1 / 3 / 2 / 4;
  background-color: #1ab059;
  color: #fff;
}
.save {
  grid-area: 3 / 3 / 4 / 4;
  background-color: #fff;
  border: 1px solid #a4a5a8;
  color: #777;
}



.mobile-wrapper {
  margin-top: 50px;
  max-width: 400px;

}

.mobile-wrapper article {
  grid-template-columns: 60px auto;
  grid-template-rows: 35px 25px auto 40px;
  width: calc(100% - 32px);
  padding: 16px;
}

.mobile-wrapper .company-logo-img {
  grid-area: 1 / 1 / 3 / 2;
  height: 60px;
  width: 60px;
}

.mobile-wrapper .job-title {
  grid-area: 1 / 2 / 2 / 2;
  padding: 8px 16px 0 16px;
}

.mobile-wrapper .company-name {
  grid-area: 2 / 2 / 3 / 2;
  padding: 0 16px;
}

.mobile-wrapper .skills-container {
  grid-area: 3 / 1 / 4 / 3;
  padding: 16px 0;
}

.mobile-wrapper .btn-container {
  grid-area: 4 / 1 / 5 / 3;
  display: flex;
}

.mobile-wrapper .btn-container button {
  height: 38px;
  flex: 1;
  width: 0;
}

.mobile-wrapper .btn-container .apply {
    margin-right: 10px;
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
							<h3>All Job Offers</h3>
						</div>
						<div class="panel-body">
							<h4>
									<?php
									if ($result->num_rows > 0) {
										// output data of each row
										while ($row = $result->fetch_assoc()) {
											$job_id = $row["job_id"];
											$title = $row["title"];
											$type = $row["type"];
											$budget = $row["budget"];
											$e_username = $row["e_username"];
											$timestamp = $row["timestamp"];
											$skills = $row["skills"];

											echo '
                                <form action="allJob.php" method="post">
                                <input type="hidden" name="jid" value="' . $job_id . '">
									<article class="job-card">
										<div class="company-logo-img">
										<img src="image/iconjob.png" alt="" width="100" height="100">
										</div>
										<div class="job-title">' . $title . '</div>
										<div class="company-name">Type:' . $type . '; Budget: ' . $budget . ' <br> ' . $timestamp . '</div>
											<div class="skills-container">
												<div class="skill">' . $skills . '</div>
											</div>
										<button class="apply">Apply</button>
										<button class="save" disabled>' . $e_username . '</button>
										
										
									</article><br>
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
					<form action="allJob.php" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="s_title">
							<center><button type="submit" class="btn btn-info">Search by Job Title</button></center>
						</div>
					</form>

					<form action="allJob.php" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="s_type">
							<center><button type="submit" class="btn btn-info">Search by Job Type</button></center>
						</div>
					</form>

					<form action="allJob.php" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="s_employer">
							<center><button type="submit" class="btn btn-info">Search by Employer</button></center>
						</div>
					</form>

					<form action="allJob.php" method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="s_id">
							<center><button type="submit" class="btn btn-info">Search by Job ID</button></center>
						</div>
					</form>

					<form action="allJob.php" method="post">
						<div class="form-group">
							<center><button type="submit" name="recentJob" class="btn btn-warning">See all recent posted jobs first</button></center>
						</div>
					</form>

					<form action="allJob.php" method="post">
						<div class="form-group">
							<center><button type="submit" name="oldJob" class="btn btn-warning">See all older posted jobs first</button></center>
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
				<h3>Quick Links</h3>
				<p><a href="index.php" style="color: #F4F2DE;">Home</a></p>
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

	<?php

	if ($e_username != $username && $_SESSION["Usertype"] != 1) {
		echo "<script>
		        $('#applybtn').hide();
		</script>";
	}
	?>


</body>

</html>