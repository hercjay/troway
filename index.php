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

	<title>TroWAY</title>
</head>
<body>

<style>

	.scroll-horizontal {
		background-color: white;
		overflow: auto;
		overflow-y: hidden;
		/* white-space: nowrap; */
		padding: 20px 10px;
	}

	.card-body{
		height: 140px;
		-webkit-mask-image: linear-gradient(180deg, #000 80%, transparent);
	}
	

	.card {
		/* box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; */
		box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
	}

	.card-title {
		color: black;
		text-decoration: none;
		font-weight: bold;
		font-size: 20px;
	}

	.card-title:hover{
		text-decoration: none;
		color: rgb(0, 180, 85);
	}

	.card-footer{
		color: rgb(0, 180, 85);
		justify-content: center;
		text-align: center;
	}

</style>


<?php 
    
    // GET 8 POSTS FOR EACH CATEGORY IF NOT ALREADY LOADED TO SESSION

        $conn = $pdo->open();

        //NEWS POSTS
        try{
            //   $stmt = $conn->prepare("SELECT * from posts WHERE isPublished = 1 AND categories_id_list like '%\"1\"%' order by created_at DESC LIMIT 8");
			$stmt = $conn->prepare("SELECT * from posts WHERE isPublished = 1 AND categories_id_list = 1 order by created_at DESC LIMIT 8");  
			$stmt->execute();
              $news_posts = $stmt->fetchAll();
              $_SESSION['news_posts'] = $news_posts;
          }
          catch(PDOException $e){
              echo "There was a problem while trying to obtain news posts: ".$e->getMessage();
          }

        //BLOG POSTS
        try{
			$stmt = $conn->prepare("SELECT * from posts WHERE isPublished = 1 AND categories_id_list = 2 order by created_at DESC LIMIT 8");
			$stmt->execute();
			$blog_posts = $stmt->fetchAll();
			$_SESSION['blog_posts'] = $blog_posts;
		}
		catch(PDOException $e){
			echo "There was a problem while trying to obtain blog posts: ".$e->getMessage();
		}


          $pdo->close();
?>



	<div class="wrapper bg-light">
		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">
				<!-- on large screen, show two carousels side by side on a row -->
				<div class="col-lg-12 d-none d-lg-block">
					<div class="row">
						<div class="col-lg-6 ">
							<?php include 'carousels/home_carousel.php'; ?>
						</div>
						<div class="col-lg-6 ">
							<?php include 'carousels/home_carousel2.php'; ?>
						</div>
					</div>
				</div>

				<!-- on smaller display, show only one -->
				<div class="d-lg-none">
					<?php include 'carousels/home_carousel3.php'; ?>
				</div>


<br/>
<section id="news-section">
	<div class="container" data-aos="fade-up">

		<h2><strong>LATEST NEWS</strong></h2>
	
		<div class="scroll-horizontal row  flex-nowrap ">
			<?php 
				$news_posts = $_SESSION['news_posts'];

				foreach ($news_posts as $j) {
					echo 
						'
							<div class="col-10 col-md-6 col-lg-4">
								<div class="card">
									<img class="card-img-top" src="images/posts/'.$j["image"].'.jpg" alt="Card image cap">
									<div class="card-body">
										<a href="./read?id='.$j["id"].'" class="card-title">'.ucwords($j["title"]).'</a>
									</div>
									<div class="card-footer">
									<small class="text-muted">'.date_format(date_create($j['updated_at']),'d/M/Y h:i A').'</small>
									</div>
								</div>
							</div>
						';
				}

			?>
		</div>

	</div>
</section> 


<br/>
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

<div class="row m-1 d-flex justify-content-center  p-2">
	<a href="contact" class="btn myBtn2 text-light" >Contact Us</a>
</div> <br/>




<h1>Frequently Asked Questions</h1>

<div class="row m-1 d-flex justify-content-center  p-2">
	<div class="col-lg-3 col-md-4  shadowCard p-4 m-2">
		<img src="images/faq.svg" class="img-fluid mb-4 p-2">
	</div>
</div>

<div class="row m-1 d-flex justify-content-center shadowCardBG p-2">
	<div class="col-lg-3 col-md-4  shadowCard p-4 m-2">
		<h5><strong>1. Can I pay my bill online?</strong></h5>
		<p>Yes, you can pay with your Credit Card, Paystack or with your Bonus Points.</p>
	</div>
	<div class="col-lg-3 col-md-4  shadowCard p-4 m-2">
		<h5><strong>2. At what time should I put out my bins for collection?</strong></h5>
		<p>You should sort your bins adequately and place them at the designated collection point before the Last Friday of every month.</p>
	</div>
	<div class="col-lg-3 col-md-4  shadowCard p-4 m-2">
		<h5><strong>3. Can my bins still be collected if I do not put them at the said time?</strong></h5>
		<p>No, your bins can only be collected if you sort them and place them at the point of collection before the designated pickup date. Failure to do so would mean that it would be collected at the next pickup date.</p>
	</div>
	<div class="col-lg-3 col-md-4  shadowCard p-4 m-2">
		<h5><strong>4. Who do I reach out to if my bins were not collected as of when due?</strong></h5>
		<p>You can reach us on any of our helplines or via direct messaging on our social media platforms or you can visit any of our branches closest to you and make an official complaint.</p>
	</div>
	<div class="col-lg-3 col-md-4  shadowCard p-4 m-2">
		<h5><strong>How do I sort out my refuse/bins?</strong></h5>
		<p>Sort your refuse according to the type of waste. Your degradable waste should go into the green waste bin, all non-degradable waste should go into the blue waste bin and all combustible waste should be placed into the red container. These waste bins should be duly placed at the front of your home for adequate disposal. Watch a pictorial illustration of this “here”</p>
	</div>
	<div class="col-lg-3 col-md-4  shadowCard p-4 m-2">
		<h5><strong>6. Where are the ASWAMA offices located?</strong></h5>
		<p>There are currently 10 ASWAMA branches spread across the state.</p>
	</div>
	<div class="col-lg-3 col-md-4  shadowCard p-4 m-2">
		<h5><strong>7. What time are the ASWAMA offices open?</strong></h5>
		<p>All branches operate from 9:00 am to 3:00 pm from Mondays to Friday.</p>
	</div>

</div>

<br/>
<div class="row m-1 d-flex justify-content-center  p-2">
	<a class="btn myBtn2 text-light" >Submit a Question</a>
</div>
<br/> <br/> <br/>






				<br/> <br/> <br/> <br/> <br/><br/>
				
			</div>
		</div>
	</div>



	<?php include 'bottom_nav/bottom_nav.php'; ?>
	<?php include 'includes/scripts.php'; ?>
</body>
</html>