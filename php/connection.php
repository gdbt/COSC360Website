<?php
	$servername = "";
	$username = "";
	$password = "";
	try{
		$pdo = new PDO("mysql:host=$servername;dbname=cosc_db",$username, $password);

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connected Successfully\n";
	}
	catch(PDOException $e){
		echo "Connection failed: ".$e->getMessage();
	}
?>
