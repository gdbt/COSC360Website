<?php
	require_once('connection.php');
	session_start();

	$checkloggedin = $_SESSION['login_user'];
	
	if(!isset($_SESSION['login_user'])){
        	header("location:..//login.html");
        	die();
   	}
?>
