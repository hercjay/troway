<?php include 'includes/session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="plugins/bootstrap-4.0.0-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">

	<title>Our Offices - TroWAY</title>
</head>
<body>

	<div class="wrapper bg-light">
		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">

                <h1>Our Offices</h1>

                <div class="row m-1 d-flex justify-content-center  p-2">
                    <div class="col-lg-3 col-md-4  shadowCard p-4 m-2">
                        <img src="images/faq.svg" class="img-fluid mb-4 p-2">
                    </div>
                </div>

                <div class="row m-1 d-flex justify-content-center shadowCardBG p-2">
                    <div class="col-lg-3 col-md-4  shadowCard p-4 m-2">
                        <h5><strong>Awka (Headquaters) </strong></h5>
                        <p>Number 45, Avenue Street, Awka.</p>
                    </div>
                    <div class="col-lg-3 col-md-4  shadowCard p-4 m-2">
                        <h5><strong>Nnewi</strong></h5>
                        <p>Number 45, Avenue Street, Nnewi.</p>
                    </div>
                    <div class="col-lg-3 col-md-4  shadowCard p-4 m-2">
                        <h5><strong>Onitsa</strong></h5>
                        <p>Number 45, Avenue Street, Onitsa.</p>
                    </div>

                </div>

                <br/>
                <div class="row m-1 d-flex justify-content-center  p-2">
                    <a href="contact" class="btn myBtn2 text-light" >Contact Us</a>
                </div>
                <br/> <br/> <br/>

                



			</div>
		</div>
	</div>



	<?php include 'bottom_nav/bottom_nav.php'; ?>
	<?php include 'includes/scripts.php'; ?>
</body>
</html>