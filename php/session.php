<?php
	require_once('connection.php');
	session_start();

	$loggedin = $_SESSION['login_user'];
	/*if(!isset($_SESSION['login_user'])){
        	header("location:login.html");
        	die();
   	}*/
?>
