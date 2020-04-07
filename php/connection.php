<?php
	$servername = "138.197.139.183"; //138.197.139.183
	$username = "main";
	$password = "P\$YCHO3367Lame";
	try{
		$pdo = new PDO("mysql:host=$servername;dbname=cosc_db",$username, $password);

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
	}
?>
