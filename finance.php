<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="plugins/bootstrap-4.0.0-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">

	<title>Payments - TroWAY</title>
</head>
<body>
	<div class="wrapper bg-light">
		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">

				<h1><strong>Sell Recyclables or Make a Payment</strong></h1>
				<p>
					Welcome to the Finance page, What would you like to do?
				</p>

				<div class="row m-1 d-flex justify-content-center shadowCardBG p-2">

					<div class="col-lg-3 col-md-4  shadowCard p-4 m-2">
						<img src="images/bin2.svg" class="img-fluid mb-4 p-2">
						<a href="#" id="purchase_bin_btn" class="btn myBtn py-10">Purchase a Bin</a>
					</div>

					<div class="col-lg-3 col-md-4  shadowCard p-4 m-2">
						<img src="images/business.svg" class="img-fluid mb-4 p-2">
						<a href="#" id="sell_btn" class="btn myBtn2">Trash for Cash</a>
					</div>

					<div class="col-lg-3 col-md-4  shadowCard p-4 m-2">
						<img src="images/pay2.svg" class="img-fluid mb-4 p-2">
						<a href="#" id="pay_levy_btn" class="btn myBtn">Pay Waste Levy</a>
					</div>
					
				</div>




				<!-- append the file for the selected menu above -->

				<div class="container" id ="purchase_bin_div">
					<?php include 'payments_includes/bin.php' ?>
				</div>

				<div class="container" id ="pay_levy_div">
					<?php include 'payments_includes/levy.php' ?>
				</div>

				<div class="container" id ="sell_div">
					<?php include 'payments_includes/sell.php' ?>
				</div>

				<br/> <br/> <br/> 



			</div>
		</div>
	</div>



	<?php include 'bottom_nav/bottom_nav-finance.php'; ?>
	<?php include 'includes/scripts.php'; ?>







<script>

	$(document).ready(function(){
		var bin_cost = 1200;
		var levy_cost = 500;

		//hide some stuffs on start
		$("#purchase_bin_div").hide();
		$("#pay_levy_div").hide();
		$("#levy_payment_type").hide();
		$("#sell_div").hide();
		$("#collection_point").hide();
		$("#sell_checkout_btn").hide();
		
		hideModalsAndMail();
		hideAllMenuDivs();
		
		
		function hideAllMenuDivs (){
			$("#payment_type").hide();
			$("#levy_payment_type").hide();
			$("#checkout_btn").hide();
			$("#levy_checkout_btn").hide();
			$("#purchase_bin_div").hide();
			$("#pay_levy_div").hide();
			$("#collection_point").hide();
			$("#sell_div").hide();
		}

		function hideModalsAndMail(){
			$("#phone_btn1").hide();
			$("#phone_btn2").hide();
			$("#phone_btn3").hide();
			$("#phone_btn4").hide();
			$("#msg_btn1").hide();
			$("#msg_btn2").hide();
			$("#msg_btn3").hide();
			$("#msg_btn4").hide();
			$("#mail_btn").hide();
		}

		
		//show corresponding div on button click and scroll to it
		$("#purchase_bin_btn").on("click", function(e){
			hideAllMenuDivs();
			e.preventDefault();
			$("#purchase_bin_div").hide().fadeIn(1000);
			//scroll to the position
			$('html, body').animate({scrollTop : $('#purchase_bin_div').offset().top - 30 }, 1000);
		});

		$("#pay_levy_btn").on("click", function(e){
			hideAllMenuDivs();
			e.preventDefault();
			$("#pay_levy_div").hide().fadeIn(1000);
			//scroll to the position
			$('html, body').animate({scrollTop : $('#pay_levy_div').offset().top - 30 }, 1000);
		});

		$("#sell_btn").on("click", function(e){
			hideAllMenuDivs();
			e.preventDefault();
			$("#sell_div").hide().fadeIn(1000);
			//scroll to the position
			$('html, body').animate({scrollTop : $('#sell_div').offset().top - 30 }, 1000);
		});



		//When USER CHOOSES number of bins to buy, show payment options
		$('#num_of_bins').change(function () {
			var optionSelected = $(this).find("option:selected");
			var valueSelected  = optionSelected.val();
			var textSelected   = optionSelected.text();
			hideModalsAndMail();

			if(valueSelected!=""){
				//set correct total bill and display payment method
				$('#total_bill').html(bin_cost * textSelected);
				$("#payment_type").fadeIn(400);
			} else {
				$('#total_bill').html("0.0");
				$("#payment_type").fadeOut(400);
			}
		});


		//When USER CHOOSES number of months to pay, show payment options
		$('#num_of_months').change(function () {
			var optionSelected = $(this).find("option:selected");
			var valueSelected  = optionSelected.val();
			var textSelected   = optionSelected.text();
			hideModalsAndMail();

			if(valueSelected!=""){
				//set correct total bill and display payment method
				$('#levy_total_bill').html(levy_cost * valueSelected);
				$("#levy_payment_type").fadeIn(400);
			} else {
				$('#levy_total_bill').html("0.0");
				$("#levy_payment_type").fadeOut(400);
			}
		});


		//When USER CHOOSES item type to sell
		$('#item_type').change(function () {
			var optionSelected = $(this).find("option:selected");
			var valueSelected  = optionSelected.val();
			var textSelected   = optionSelected.text();
			hideModalsAndMail();

			if(valueSelected!=""){
				//display collection point option
				//$('#levy_total_bill').html(levy_cost * valueSelected);
				$("#collection_point").fadeIn(400);
			} else {
				//$('#levy_total_bill').html("0.0");
				$("#collection_point").fadeOut(400);
			}
		});



		//When USER CHOOSES selects payment option, show checkout button
		$('#payment_type').change(function () {
			var optionSelected = $(this).find("option:selected");
			var valueSelected  = optionSelected.val();
			var textSelected   = optionSelected.text();
			hideModalsAndMail();

			if(valueSelected!=""){
				$("#checkout_btn").fadeIn(400);
			} else {
				$("#checkout_btn").fadeOut(400);
			}
		});


		//When USER CHOOSES selects payment option, show checkout button
		$('#levy_payment_type').change(function () {
			var optionSelected = $(this).find("option:selected");
			var valueSelected  = optionSelected.val();
			var textSelected   = optionSelected.text();
			hideModalsAndMail();

			if(valueSelected!=""){
				$("#levy_checkout_btn").fadeIn(400);
			} else {
				$("#levy_checkout_btn").fadeOut(400);
			}
		});


		//When USER CHOOSES collection point, display sell button
		$('#collection_point').change(function () {
			var optionSelected = $(this).find("option:selected");
			var valueSelected  = optionSelected.val();
			var textSelected   = optionSelected.text();
			hideModalsAndMail();

			if(valueSelected!=""){
				$("#sell_checkout_btn").fadeIn(400);
			} else {
				$("#sell_checkout_btn").fadeOut(400);
			}
		});







		  $(document).on("click", "body", function(){
			  $("#doctor_search-list").html(""); //hide the dropdown if user clicks outside the area
			  $("#pharmacy_search-list").html("");
			  selectedDoctorID = "";
			  selectedPharmacyID = "";
		  });






		  //WHEN REGISTER VISIT BUTTON IS CLICKED
		  /* $(document).on("click", "#register_visit_btn", function(){
				//e.preventDefault();
				if ("geolocation" in navigator){ //check if geolocation is available in the browser
					//try to get user current location using getCurrentPosition() method
					navigator.geolocation.getCurrentPosition(function(position){ 
							alert("Found your location \nLat : "+position.coords.latitude+" \nLong :"+ position.coords.longitude);
							
						});
				}else{
					alert("Browser doesn't support geolocation!");
				}
		  }); */
		









		  $('#phone_btn').on("click", function(e){
				e.preventDefault();
		  });

	}); //document on ready


</script>


</body>
</html>