<?php 
	include 'includes/session.php'; 
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

	<title>News & Blog - Waste-Away</title>
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
				</section> <br/> 



				<section id="blog-section">
					<div class="container" data-aos="fade-up">

						<h2><strong>OUR POSTS</strong></h2>
					
						<div class="scroll-horizontal row  flex-nowrap ">
							<?php 
								$blog_posts = $_SESSION['blog_posts'];

								foreach ($blog_posts as $j) {
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
				</section> <br/> 



				<section id="igbo-radio-section">
					<div class="container" data-aos="fade-up">

						<h2><strong>IGBO Jingles/Videos</strong></h2>
						<p>Listen to Audios or Watch Videos on Waste Management in IGBO Language</p>
					
						<div class="scroll-horizontal row  flex-nowrap ">

							<div class="col-10 col-md-6 col-lg-4">
								<div class="card">
									<img class="card-img-top" src="images/podcast.jpg" alt="">
									<div class="card-body">
										<div class="card-title">Sanitation Announcement: 05/Dec/2022 08:45AM</div>
									</div>
									<div class="card-footer">
										<audio controls style="width: 100%; margin-top: 10px;">
											<source src="audios/sani_igbo2.mp3" type="audio/mp3">
											Your browser does not support the audio element.
										</audio>
										<small class="text-muted">05/Dec/2022 08:45AM</small>
									</div>
								</div>
							</div>

							<div class="col-10 col-md-6 col-lg-4">
								<div class="card">
									<img class="card-img-top " src="images/podcast2.jpg" alt="">
									<div class="card-body">
										<div class="card-title">Door-to-Door Collection of Waste: 05/Dec/2022 08:45AM</div>
									</div>
									<div class="card-footer">
										<audio controls style="width: 100%; margin-top: 10px;">
											<source src="audios/d2d_igbo.mp3" type="audio/mp3">
											Your browser does not support the audio element.
										</audio>
										<small class="text-muted">05/Dec/2022 08:45AM</small>
									</div>
								</div>
							</div>

						</div>

					</div>
				</section> <br/> 






				<section id="english-radio-section">
					<div class="container" data-aos="fade-up">

						<h2><strong>ENGLISH Jingles/Videos</strong></h2>
						<p>Listen to Audios or Watch Videos on Waste Management</p>
					
						<div class="scroll-horizontal row  flex-nowrap ">

							<div class="col-10 col-md-6 col-lg-4">
								<div class="card">
									<img class="card-img-top " src="images/podcast2.jpg" alt="">
									<div class="card-body">
										<div class="card-title">Door-to-Door Collection of Waste: 01/Dec/2022 08:45AM</div>
									</div>
									<div class="card-footer">
										<audio controls style="width: 100%; margin-top: 10px;">
											<source src="audios/d2d_eng.mp3" type="audio/mp3">
											Your browser does not support the audio element.
										</audio>
										<small class="text-muted">01/Dec/2022 08:45AM</small>
									</div>
								</div>
							</div>

							<div class="col-12 col-md-7 col-lg-5">
								<div class="card">
									<video width="100%" controls  poster="images/video.jpg">
										<source src="videos/sani_eng.m4v" type="video/mp4">
										Your browser does not support HTML video.
									</video>
									<div class="card-body">
										<div class="card-title">ASWAMA Public Service Announcement: 09/Dec/2022 08:45AM</div>
									</div>
									<div class="card-footer">
										<small class="text-muted">09/Dec/2022 08:45AM</small>
									</div>
								</div>
							</div>

							<div class="col-10 col-md-6 col-lg-4">
								<div class="card">
									<img class="card-img-top" src="images/podcast.jpg" alt="">
									<div class="card-body">
										<div class="card-title">Sanitation Announcement: 05/Dec/2022 08:45AM</div>
									</div>
									<div class="card-footer">
										<audio controls style="width: 100%; margin-top: 10px;">
											<source src="audios/sani_eng2.mp3" type="audio/mp3">
											Your browser does not support the audio element.
										</audio>
										<small class="text-muted">05/Dec/2022 08:45AM</small>
									</div>
								</div>
							</div>

						</div>

					</div>
				</section> <br/> <br/> <br/> <br/> <br/>

			</div>
		</div>
	</div>



	<?php include 'bottom_nav/bottom_nav-blog.php'; ?>
	<?php include 'includes/scripts.php'; ?>
</body>
</html>