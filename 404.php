<?php
//   header("HTTP/1.0 404 Not Found");
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

	<title>404 Error - Page Not Found</title>
</head>
<body>
	<div class="wrapper">
		<?php include 'includes/navbar.php'; ?>

		<div class="container">
			<div class="row m-1 shadowCard d-flex justify-content-center p-4">
				<div class="row col-8 justify-content-center">
					<h1>Oops! The Requested Page was NOT found!!!</h1>
				</div>
				<div class="col-lg-6 col-sm-10">
					<img src="images/404.svg" class="img-fluid mb-4 p-4">
					<a href="index" class="btn myBtn">Return to Homepage</a>
				</div>
			</div>
		</div>
	</div>




	<?php include 'includes/scripts.php'; ?>
</body>
</html>