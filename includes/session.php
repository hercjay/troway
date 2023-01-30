<?php
	include 'includes/conn.php';
	session_start();

	/* if(isset($_SESSION['admin'])){
	 	header('location: admin-dashboard');
	} */

	if(isset($_SESSION['user'])){
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
			$stmt->execute(['id'=>$_SESSION['user']]);
			$user = $stmt->fetch();
		}
		catch(PDOException $e){
			echo "An error occured with DB connection during login: " . $e->getMessage();
		}

		$pdo->close();
	}
?>