<?php include 'includes/session.php'; ?>

<?php
  if(isset($_SESSION['user'])){
    header('location: dashboard');
  }
  else if(isset($_SESSION['admin'])){
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

	<title>Login - Waste-Away</title>
</head>
<body>
	<div class="wrapper">
		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">
                
                <?php
                    if(isset($_SESSION['error'])){
                        echo "
                        <div class='alert alert-danger text-center'>
                            <p>".$_SESSION['error']."</p> 
                        </div>
                        ";
                        unset($_SESSION['error']);
                    }
                    if(isset($_SESSION['success'])){
                        echo "
                        <div class='alert alert-success text-center'>
                            <p>".$_SESSION['success']."</p> 
                        </div>
                        ";
                        unset($_SESSION['success']);
                    }
                    /* $password = password_hash("superadmin", PASSWORD_DEFAULT); */
                ?>
                

				<div class="row m-1 shadowCard d-flex justify-content-center">
                    <div class="row col-8 justify-content-center p-4">
                        <h3>Login Form</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-10">
                            <img src="images/metrics.png" class="img-fluid p-2">
                        </div>
                        <div class="col-lg-6 col-sm-10 p-4 d-flex justify-content-center" >
                            <div class="col-lg-8 col-sm-12 my-auto">
                                <form action="loginHandler" method="POST">
                                    <div class="form-group">
                                        <label for="email">Home ID/Email address</label>
                                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="ID/Email">
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                    </div>
                                    <!-- <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div> -->
                                    <button type="submit" class="btn myBtn" name="login">Sign In</button> <br/> <br/>
                                    <div class="form-group">
                                        <a href="forgot-password" style="color: black;">Forgot Password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>

	</div>



	<?php include 'bottom_nav/bottom_nav-dashboard.php'; ?>
	<?php include 'includes/scripts.php'; ?>
</body>
</html>