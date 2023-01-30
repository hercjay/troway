
<?php 
    include 'includes/conn.php';
    session_start();
?>


<!-- if not logged in, redirect to login page -->

<?php
	if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])){
		header('location: login');
	}
	/* else if (isset($_SESSION['user'])){
		header('location: dashboard');
	} */
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

	<title>Admin Dashboard - TroWAY</title>
</head>
<body>
	<div class="wrapper bg-light">
		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">

				<h1><strong>Admin Dashboard</strong></h1>

				<div class="row m-1 d-flex justify-content-center shadowCardBG p-2">

					<div class="col-lg-4 col-md-5  shadowCard p-4 m-2">
						<h2><strong>Household Management</strong></h2>
						<img src="images/home2.svg" class="img-fluid mb-4 p-2">
						<h5>Total Number of Registered Households: </h5><h2><strong>94,786</strong></h2> <br/>
						<h5>Number of Households yet to pay Waste Levy for the past month: </h5><h2><strong>21,145</strong></h2> <br/>

						<button type="button" class="btn myBtn" data-toggle="collapse" data-target="#register_household">Register a Household</button>
						<div id="register_household" class="collapse"> <br/>

							<form method="post" action="register-household">
								<div class="form-group" id="town">
									<label for="town">Town/City/Village:</label>
									<select  id="town" type="town" class="form-control " name="town" required>
										<option value=""><----Select a Value----></option>
										<option value="amawbia">Amawbia</option>
										<option value="nnewi">Nnewi</option>
										<option value="awka">Awka</option>
										<option value="ekwulobia">Ekwulobia</option>
										<option value="onitsa">Onitsa</option>
										<option value="obosi">Obosi</option>
										<option value="ichida">Ichida</option>
										<option value="oba">Oba</option>
										<option value="enugu-ukwu">Enugu-Ukwu</option>
									</select>
								</div>

								<div class="form-group" id="street">
									<label for="street">Street:</label>
									<select  id="street" type="street" class="form-control " name="street" required>
										<option value=""><----Select a Value----></option>
										<option value="abakiliki">Abakiliki Street</option>
										<option value="achara1">Achara Junction I</option>
										<option value="awka">Last Bus Stop III</option>
										<option value="ekwulobia">Chief Emeka Street</option>
										<option value="onitsa">Charles Odili Street</option>
									</select>
								</div>

								<div class="form-group" id="house_number">
									<label for="house_number">House/Building Number:</label>
									<select  id="house_number" type="house_number" class="form-control " name="house_number" required>
										<option value=""><----Select a Value----></option>
										<option value="1">0001</option>
										<option value="2">0002</option>
										<option value="3">0003</option>
										<option value="4">0004</option>
										<option value="5">0005</option>
									</select>
								</div>

								<div class="form-group" id="household_number">
									<label for="household_number">Household/Flat Number:</label>
									<select  id="household_number" type="household_number" class="form-control " name="household_number" required>
										<option value=""><----Select a Value----></option>
										<option value="1">01</option>
										<option value="2">02</option>
										<option value="3">03</option>
										<option value="4">04</option>
										<option value="5">05</option>
									</select>
								</div>

								<button type="submit" name="submit" class="btn myBtn">Submit</button>
							</form>

						</div>

					</div>

					<div class="col-lg-4 col-md-5  shadowCard p-4 m-2">
						<h2><strong>Reports /Enquiries /Proposals</strong></h2>
						<img src="images/notifications.svg" class="img-fluid mb-4 p-2">
						<h5>Total number of Reports received: </h5><h2><strong>1,122</strong></h2> <br/>
						<h5>Total number of Enquiries received: </h5><h2><strong>526</strong></h2> <br/>
						<h5>Total number of Proposals received: </h5><h2><strong>487</strong></h2> <br/>
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