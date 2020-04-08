<?php
	$servername = ""; //Removed sensitive information. 
	$username = "";
	$password = "";
	try{
		$pdo = new PDO("mysql:host=$servername;dbname=cosc_db",$username, $password);

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
	}
?>
