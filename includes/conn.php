<?php

Class Database{
 
	private $server = "mysql:host=localhost;dbname=troway";
	private $username = "root";
	private $password = "";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;
 	
	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "An error occured while trying to establish a connection to the database: " . $e->getMessage();
 		}
 
    }
 
	public function close(){
   		$this->conn = null;
 	}
 
}

function clean($b){


	$connect = mysqli_connect("localhost", "root", "", "waste-away");
	mysqli_real_escape_string($connect, $b);

	/*make alphanumeric , remove other symbols*/

  preg_replace("/[^a-z0-9_\s-]/", "", $b);
	/*remove any multiple white spaces*/
	preg_replace("/[\s-]+/", " ", $b); 
	

	return $b;
}

$pdo = new Database();
 
?>