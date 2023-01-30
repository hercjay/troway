<?php 
	include 'includes/session.php'; 
	
	if(isset($_GET['id'])) {
		$id = clean($_GET['id']);

		    // GET THE POST FROM DB

			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("SELECT * from posts WHERE id=:id");  
				$stmt->execute(['id'=>$id]);
				  $post = $stmt->fetch();
			  }
			  catch(PDOException $e){
				  echo "There was a problem while trying to load post for reading: ".$e->getMessage();
			  }
	
			  $pdo->close();
	}

	else {
		header('location: /blog');
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




	<div class="wrapper bg-light">
		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">

				<section id="blog_view-section">
					<div class="container" data-aos="fade-up">

						<h3><strong><?php echo $post['title']; ?></strong></h3>

						<div class="row m-1 d-flex justify-content-center shadowCardBG p-2">

							<div class="col-12  shadowCard p-2 m-2">

								<div class="row">
									<div class="col-sm-12 col-md-6 col-lg-6">
										<img src="images/posts/<?php echo $post['image']; ?>.jpg" class="img-fluid mb-4 p-2">
									</div>
									<div class="col-sm-12 col-md-6 col-lg-6 text-left">
										Date: <strong><?php echo date_format(date_create($post['updated_at']),'d/M/Y h:i A') ?></strong> <br/>
										Reads: <strong><?php echo $post['views']; ?></strong>
									</div>
								</div> <br/> <br/>

								<p> <?php echo $post['content']; ?></p> <br/>

								<!-- <a href="#" id="purchase_bin_btn" class="btn myBtn py-10">Purchase a Bin</a> -->
							</div>

						</div>


					</div>
				</section> <br/>


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
				</section> <br/> <br/> <br/> <br/>


			</div>
		</div>
	</div>



	<?php include 'bottom_nav/bottom_nav-blog.php'; ?>
	<?php include 'includes/scripts.php'; ?>
</body>
</html>