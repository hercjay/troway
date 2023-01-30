<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="plugins/bootstrap-4.0.0-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">

	<title>Payment Successful - TroWAY</title>
</head>
<body>
	<div class="wrapper bg-light">
		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">

				
				

				<div class="row m-1 d-flex justify-content-center shadowCardBG p-2">

					<div class="col-lg-6 col-md-6  shadowCard p-4 m-2">
						<h2><strong>PAYMENT SUCCESSFUL!</strong></h2> 
						<img src="images/doneG.svg" class="img-fluid mb-4 p-2">
						<h4>
							Your Payment was successful
						</h4> <br/>
						<a href="./" class="btn myBtn" id="checkout_btn">Go back Home</a>
						<a href="./blog" class="btn myBtn2" id="checkout_btn">Read News/Posts</a>
					</div>
					
				</div>


				<br/> <br/> <br/> 



			</div>
		</div>
	</div>



	<?php include 'bottom_nav/bottom_nav-finance.php'; ?>
	<?php include 'includes/scripts.php'; ?>







</body>
</html>