<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Account Creation</title>
        <meta charset="UTF-8">
        <link rel="Stylesheet" href ="../css/global.css">
    </head>
    <body>
    <header>
        <div class ="logo">
            <img src ="../images/logo.png" alt="logo">
        </div>
        <div class ="top">
            <h1>Login Attempt!</h1>
        </div>
    </header>
        <main>
<?php
require_once('connection.php');
session_start();
try{
        global $pdo;
	$username = $_GET['username'];
	$password = $_GET['password'];

        $sql = "SELECT password FROM Account WHERE Username = :username";
        $stmt = $pdo->prepare($sql);
	$stmt->bindParam(':username',$username);
        $stmt->execute();
	$result = $stmt->fetch();
	$grabpass = $result['password'];
	echo "hello $username With password $password Your actual password is ";
	if($password == $grabpass){
		echo "login Successful ";
		echo $grabpass;
		echo " yo";
		$_SESSION['login_user'] = $username;
		echo "<script>window.location.replace('../MainLoggedin.php')</script>";
	}
	else {
		echo "<script>window.location.replace('../login.html')</script>";
	}
}catch(PDOException $e){
        echo $e->getMessage();
}
$pdo = null;
?>
        </main>
    </body>
</html>
