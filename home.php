<?php include 'includes/session.php'; ?>

<?php
  if(!isset($_SESSION['user'])){
    header('location: login');
  }



if(!isset($_SESSION['hospitals']) || !isset($_SESSION['pharmacies'])){
	$conn = $pdo->open();

	try{
		$getHospitalsQuery = $conn->prepare("SELECT * FROM hospitals_db");
		$getHospitalsQuery->execute();

		$hospitals = $getHospitalsQuery->fetchAll();
		$_SESSION['hospitals'] = $hospitals;


		$getPharmaciesQuery = $conn->prepare("SELECT * FROM distributors_db");
		$getPharmaciesQuery->execute();

		$pharmacies = $getPharmaciesQuery->fetchAll();
		$_SESSION['pharmacies'] = $pharmacies;
	}

	catch(PDOException $e){
		echo "There was an error while trying to obtain Hospitals and Pharmacies DB: " . $e->getMessage();
	}

	$pdo->close();
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

	<link href="plugins/jquery-editable-select/dist/jquery-editable-select.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/jquery-editable-select@2.2.5/dist/jquery-editable-select.css" rel="stylesheet">
	

	<style type="text/css">

		#search-list-item {
			font-weight: 300;		
		}

		#search-list-item:hover{
			background: rgb(100,100,100);
			color: white;
			border: 1px solid white;
		}

		label, p, div {
			font-weight: 400;
		}

	</style>



	<title>User Dashboard - Pharmalister CRM</title>
</head>
<body>

	<div class="wrapper">
		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">


				<!--Phone A Client Modal -->
				<div class="modal fade" id="phone_modal" tabindex="-1" role="dialog" aria-labelledby="phoneModalTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Phone a Client</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							Click on the Number to call below (Number may not be available in the database):
						</div>
						<div class="modal-footer">
							<div class="col-12">
								<a id="phone_btn1" href="tel:" class="w-100 btn myBtn green-bg mb-2 bg-success"></a>
								<a id="phone_btn2" href="tel:" class="w-100 btn myBtn green-bg mb-2 bg-success"></a>
								<div class="row">
									<div class="col-6">
										<a id="phone_btn3" href="tel:" class="w-100 btn myBtn green-bg bg-success"></a> 
									</div>
									<div class="col-6">
										<a id="phone_btn4" href="tel:" class="w-100 btn myBtn green-bg bg-success"></a> 
									</div>
								</div>
								<div class="row d-flex justify-content-center">
									<a id="phone_modal_close_btn" href="#" class="w-50 btn myBtn m-2 bg-danger" data-dismiss="modal">Close</a> 
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>


				<!--Message a client Modal -->
				<div class="modal fade" id="msg_modal" tabindex="-1" role="dialog" aria-labelledby="phoneModalTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLongTitle">Message a Client</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							Click on the Number to message below (Number may not be available in the database):
						</div>
						<div class="modal-footer">
							<div class="col-12">
								<a id="msg_btn1" href="tel:" class="w-100 btn myBtn green-bg mb-2 bg-success"></a>
								<a id="msg_btn2" href="tel:" class="w-100 btn myBtn green-bg mb-2 bg-success"></a>
								<div class="row">
									<div class="col-6">
										<a id="msg_btn3" href="tel:" class="w-100 btn myBtn green-bg bg-success"></a> 
									</div>
									<div class="col-6">
										<a id="msg_btn4" href="tel:" class="w-100 btn myBtn green-bg bg-success"></a> 
									</div>
								</div>
								<div class="row d-flex justify-content-center">
									<a id="msg_modal_close_btn" href="#" class="w-50 btn myBtn m-2 bg-danger" data-dismiss="modal">Close</a> 
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>






				<div class="row col-8">
					<h2><strong>User Dashboard<strong></h2>
				</div>

				<div class="row m-1 d-flex justify-content-center shadowCardBG p-2">

					<div class="col-lg-3 col-md-4  shadowCard p-4 m-2">
						<img src="images/smartwatch-675-591.svg" class="img-fluid mb-4 p-2">
						<a href="#" id="clients_database_btn" class="btn myBtn py-10">Clients Database</a>
					</div>

					<div class="col-lg-3 col-md-4  shadowCard p-4 m-2">
						<img src="images/metrics.svg" class="img-fluid mb-4 p-2">
						<a href="#" id="reports_btn" class="btn myBtn">Show Reports</a>
					</div>

					<div class="col-lg-3 col-md-4  shadowCard p-4 m-2">
						<img src="images/location.svg" class="img-fluid mb-4 p-2">
						<a href="#" id="add_client_btn"  class="btn myBtn">Add a New Client</a>
					</div>
					
				</div>


				<!-- append the file for the selected menu above -->

				<div class="container" id ="clients_database_div">
					<?php include 'user_dashboard_includes/clients_database.php' ?>
				</div>

				<div class="container" id ="reports_div">
					<?php include 'user_dashboard_includes/reports.php' ?>
				</div>

				<div class="container" id ="selected_client_div">
					<?php include 'user_dashboard_includes/selected_client.php' ?>
				</div>

				

				<br/> <br/> <br/> 
					

			</div>
		</div>
	</div>




	<?php include 'includes/scripts.php'; ?>
  		


	
	<script src="https://cdn.jsdelivr.net/npm/jquery-editable-select@2.2.5/dist/jquery-editable-select.min.js"></script>

	<script>

        $(document).ready(function(){

			//hide some stuffs on start
			$("#pharmacyForm").hide();
			$("#doctorsForm").hide();
			hideModalsAndMail();
			hideAllMenuDivs();
			
			
			function hideAllMenuDivs (){
				$("#clients_database_div").hide();
				$("#reports_div").hide();
				$("#selected_client_div").hide();
				$("#add_client_div").hide();
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
			$("#clients_database_btn").on("click", function(e){
				hideAllMenuDivs();
				e.preventDefault();
				$("#clients_database_div").hide().fadeIn(1000);
				//scroll to the position
                $('html, body').animate({scrollTop : $('#clients_database_div').offset().top}, 1000);
			});

			$("#reports_btn").on("click", function(e){
				hideAllMenuDivs();
				e.preventDefault();
				$("#reports_div").hide().fadeIn(1000);
				//scroll to the position
                $('html, body').animate({scrollTop : $('#reports_div').offset().top}, 1000);
			});
			

			//a function that shows or hides alert if a user does not select an item from the database dropdown
			var selectedDoctorID;
			var selectedPharmacyID ;
			var tableSearched;


			//When content is typed in doctor searchbox to search for doctor
			$("#doctor_search").keyup(function(){ //when something is typed into the search box
                  var searchText = $(this).val();
                    
                  if(searchText.length > 1){;
                      $.ajax({
                          url: 'clients_database_ajax.php',
                          method: 'POST',
                          data: {doctorSearch: searchText},
                          success: function(data_retrieved){
                              
                              $('#doctor_search-list').html(data_retrieved); //obtain the list from database and attach it
                          }
                      });
                  }
                  else{
                    $('#doctor_search-list').html("");
                  }
              });




			//When content is typed in PHARMACY searchbox to search for doctor
			$("#pharmacy_search").keyup(function(){ //when something is typed into the search box
                  var searchText = $(this).val();
                    
                  if(searchText.length > 1){;
                      $.ajax({
                          url: 'clients_database_ajax.php',
                          method: 'POST',
                          data: {pharmacySearch: searchText},
                          success: function(data_retrieved){
                              
                              $('#pharmacy_search-list').html(data_retrieved); //obtain the list from database and attach it
                          }
                      });
                  }
                  else{
                    $('#pharmacy_search-list').html("");
                  }
              });






			//When USER CHOOSES between hospital and pharmacy
			$('#visit_query').change(function () {
				var optionSelected = $(this).find("option:selected");
				var valueSelected  = optionSelected.val();
				var textSelected   = optionSelected.text();
				hideModalsAndMail();

				if(valueSelected=="doctor"){
					tableSearched = "doctor";
					//hide pharmacy
					$("#pharmacy_search").val("");
					$('#pharmacy_search-list').html("");
					$("#pharmacyForm").fadeOut(500);

					//show doctor
					$("#doctorsForm").fadeIn(500);
				}
				else if (valueSelected=="pharmacy"){
					tableSearched = "pharmacy";
					//show pharmacy
					$("#pharmacyForm").fadeIn(500);

					//hide doctor
					$("#doctorsForm").fadeOut(500);
					$("#doctor_search").val("");
					$('#doctor_search-list').html("");
				}
				else {
					$("#pharmacyForm").fadeOut(500);
					$("#doctorsForm").fadeOut(500);
				}	
			});





			//when user chooses an item from the suggestions list
			$(document).on("click", ".list-group-item", function(){
				//if it's a doctors or pharmacies list, set the correct ID and trigger ajax to save user visitation
				if(tableSearched=="doctor") {
					$("#doctor_search-list").html("");
					selectedDoctorID = $(this).attr("value") //the id was stored as "value" in the ajax php file

					$.ajax({
                          url: 'clients_database_ajax.php',
                          method: 'POST',
						  dataType: 'json',
                          data: {selectedDoctorID: selectedDoctorID},
                          success: function(data_retrieved){
                              $('#client_details_div').html(data_retrieved['text2']);

							  //if email is available, show button
							  if(!data_retrieved['email2']==""){
									$("#mail_btn").attr("href", "mailto:"+data_retrieved['email2']).show();
							  }
							  

							 //assign the phone numbers to the modal
							var contactsArray = data_retrieved['contacts2'].split(', ');
							for (var i = 0; i < contactsArray.length; i++) {
								switch(i) {
									case 0:
										$("#phone_btn1").text(contactsArray[i].replace(',','')).show();
										$("#phone_btn1").attr("href", "tel:"+contactsArray[i].replace(',',''));
										$("#msg_btn1").text(contactsArray[i].replace(',','')).show();
										$("#msg_btn1").attr("href", "sms:"+contactsArray[i].replace(',',''));
										break;
									case 1:
										$("#phone_btn2").text(contactsArray[i].replace(',','')).show();
										$("#phone_btn2").attr("href", "tel:"+contactsArray[i].replace(',',''));
										$("#msg_btn2").text(contactsArray[i].replace(',','')).show();
										$("#msg_btn2").attr("href", "sms:"+contactsArray[i].replace(',',''));
										break;
									case 2:
										$("#phone_btn3").text(contactsArray[i].replace(',','')).show();
										$("#phone_btn3").attr("href", "tel:"+contactsArray[i].replace(',',''));
										$("#msg_btn3").text(contactsArray[i].replace(',','')).show();
										$("#msg_btn3").attr("href", "sms:"+contactsArray[i].replace(',',''));
										break;
									case 3:
										$("#phone_btn4").text(contactsArray[i].replace(',','')).show();
										$("#phone_btn4").attr("href", "tel:"+contactsArray[i].replace(',',''));
										$("#msg_btn4").text(contactsArray[i].replace(',','')).show();
										$("#msg_btn4").attr("href", "sms:"+contactsArray[i].replace(',',''));
										break;
									default:
										break;
								}
							}
                          },
						  error: function(xhr, status, error) {
							alert(xhr.responseText);
						  },
                      });

					$("#selected_client_div").hide().fadeIn(1000);
					$('html, body').animate({scrollTop : $('#selected_client_div').offset().top}, 1000);
				}

				else if(tableSearched=="pharmacy") {
					$("#pharmacy_search-list").html("");
					selectedPharmacyID = $(this).attr("value"); //the id was stored as "value" in the ajax php file
					

					$.ajax({
                          url: 'clients_database_ajax.php',
                          method: 'POST',
						  dataType: 'json',
                          data: {selectedPharmacyID: selectedPharmacyID},
                          success: function(data_retrieved){
                              $('#client_details_div').html(data_retrieved['text']);
							  //assign the phone numbers to the modal

							var contactsArray = data_retrieved['contacts'].split(', ');
							for (var i = 0; i < contactsArray.length; i++) {
								switch(i) {
									case 0:
										$("#phone_btn1").text(contactsArray[i].replace(',','')).show();
										$("#phone_btn1").attr("href", "tel:"+contactsArray[i].replace(',',''));
										$("#msg_btn1").text(contactsArray[i].replace(',','')).show();
										$("#msg_btn1").attr("href", "sms:"+contactsArray[i].replace(',',''));
										break;
									case 1:
										$("#phone_btn2").text(contactsArray[i].replace(',','')).show();
										$("#phone_btn2").attr("href", "tel:"+contactsArray[i].replace(',',''));
										$("#msg_btn2").text(contactsArray[i].replace(',','')).show();
										$("#msg_btn2").attr("href", "sms:"+contactsArray[i].replace(',',''));
										break;
									case 2:
										$("#phone_btn3").text(contactsArray[i].replace(',','')).show();
										$("#phone_btn3").attr("href", "tel:"+contactsArray[i].replace(',',''));
										$("#msg_btn3").text(contactsArray[i].replace(',','')).show();
										$("#msg_btn3").attr("href", "sms:"+contactsArray[i].replace(',',''));
										break;
									case 3:
										$("#phone_btn4").text(contactsArray[i].replace(',','')).show();
										$("#phone_btn4").attr("href", "tel:"+contactsArray[i].replace(',',''));
										$("#msg_btn4").text(contactsArray[i].replace(',','')).show();
										$("#msg_btn4").attr("href", "sms:"+contactsArray[i].replace(',',''));
										break;
									default:
										break;
								}
							}
                          },
						  error: function(xhr, status, error) {
							alert(xhr.responseText);
						  },
                      });

					$("#selected_client_div").hide().fadeIn(1000);
					$('html, body').animate({scrollTop : $('#selected_client_div').offset().top}, 1000);
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











<script type="text/javascript">
var map;
function initMap() {
	map = new google.maps.Map($("#map")[0], {
		center: {lat: -34.397, lng: 150.644},
		zoom: 8
	  });
}

$(document).on("click", "#register_visit_btn", function(){//user click on button
	if ("geolocation" in navigator){
			navigator.geolocation.getCurrentPosition(show_location, show_error, {timeout:1000, enableHighAccuracy: true}); //position request
		}else{
			console.log("Browser doesn't support geolocation!");
	}
});	

//Success Callback
function show_location(position){
	infoWindow = new google.maps.InfoWindow({map: map});
	var pos = {lat: position.coords.latitude, lng: position.coords.longitude};
	infoWindow.setPosition(pos);
	infoWindow.setContent('User Location found.');
	map.setCenter(pos);
}

//Error Callback
function show_error(error){
   switch(error.code) {
        case error.PERMISSION_DENIED:
            alert("Permission denied by user.");
            break;
        case error.POSITION_UNAVAILABLE:
            alert("Location position unavailable.");
            break;
        case error.TIMEOUT:
            alert("Request timeout.");
            break;
        case error.UNKNOWN_ERROR:
            alert("Unknown error.");
            break;
    }
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCw-Viepxab4m9pRRQyjm_yRq1uhOj9iPc&callback=initMap" async defer></script>

</body>
</html>