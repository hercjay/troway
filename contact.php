
<?php 
    include 'includes/conn.php';
    session_start();
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

	<title>Contact Us - TroWAY</title>
</head>
<body>
	<div class="wrapper bg-light">
		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">

				<h1><strong>Contact Us</strong></h1>

				<div class="row m-1 d-flex justify-content-center shadowCardBG p-2">

					<div class="col-lg-4 col-md-5  shadowCard p-4 m-2">
						<h2><strong>Report a Waste Dump Site</strong></h2>
						<img src="images/pollution.svg" class="img-fluid mb-4 p-2">
						<h5>
							Tell us about an indiscriminate Waste Dump site with location and a picture.
							You may also inform us of a proper waste dump site that has not been attended to in a long while.
						</h5><br/>

						<button type="button" class="btn myBtn2" data-toggle="collapse" data-target="#report_dump">Report a Waste Dump Site</button>
						<div id="report_dump" class="collapse"> <br/>

							<form method="post" action="report-dump">
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

								<div class="form-group" id="picture">
									<label for="picture">Photo/Picture:</label>
									<input type="file"  id="picture" type="picture" class="form-control " name="picture" required>
							
									</input>
								</div>

								<button type="submit" name="submit" class="btn myBtn">Submit</button>
							</form>

						</div>

					</div>

					<div class="col-lg-4 col-md-5  shadowCard p-4 m-2">

					<h2><strong>Enquiry or Proposal</strong></h2>
						<img src="images/question.svg" class="img-fluid mb-4 p-2">
						<h5>
							Ask any questions that you may have about proper waste management and the activities of the agency.
							Submit proposals or suggestions to make waste management better.
						</h5><br/>

						<button type="button" class="btn myBtn" data-toggle="collapse" data-target="#enquiry-proposal">Make an Enquiry/Submit a Proposal</button>
						<div id="enquiry-proposal" class="collapse"> <br/>

							<form method="post" action="enquiry-proposal">
								<div class="form-group" id="type">
									<label for="type">What would you like to do?</label>
									<select  id="type" type="type" class="form-control " name="type" required>
										<option value=""><----Select a Value----></option>
										<option value="enquiry">Make an Enquiry</option>
										<option value="proposal">Submit a proposal/suggestion</option>
									</select>
								</div>

								<div class="form-group" id="message">
									<label for="message">Content:</label>
									<textarea height="400px" id="message" type="message" class="form-control " name="message" required>
									</textarea>
								</div>

								<button type="submit" name="submit" class="btn myBtn">Submit</button>
							</form>

						</div>
					
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