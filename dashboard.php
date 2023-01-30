
<?php include 'includes/session.php'; ?>

<!-- if not logged in, redirect to login page -->

<?php
	if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
		header('location: login');
	}
	if(isset($_SESSION['admin'])){
		header('location: admin-dashboard');
	}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="plugins/bootstrap-4.0.0-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">

	<title>User Dashboard - TroWAY</title>
</head>
<body>
	<div class="wrapper bg-light">
		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">

				<h1><strong>User Dashboard</strong></h1>

				<div class="row m-1 d-flex justify-content-center shadowCardBG p-2">

					<div class="col-lg-4 col-md-5  shadowCard p-4 m-2">
						<img src="images/home2.svg" class="img-fluid mb-4 p-2">
						<strong>Household ID: </strong><h3>Awka-Ifite-0032-02</h3>
					</div>

					<div class="col-lg-4 col-md-5   shadowCard p-4 m-2">
						<img src="images/prize.svg" class="img-fluid mb-4 p-2">
						<h5>Available Recycle Points: </h5><h2><strong>568</strong></h2> <br/>
						<h5>Total Recycle Points Earned: </h5><h2><strong>4295</strong></h2>
					</div>

				</div>

				<div class="row m-1 d-flex justify-content-center shadowCardBG p-2">
					<a class="nav-link btn myBtn2" href="logout">Logout</a>
				</div>

				<br/> <br/> <br/>

			</div>
		</div>
	</div>



	<?php include 'bottom_nav/bottom_nav-dashboard.php'; ?>
	<?php include 'includes/scripts.php'; ?>
</body>
</html>