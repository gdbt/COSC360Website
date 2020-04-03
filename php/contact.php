<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Post Creation</title>
        <meta charset="UTF-8">
        <link rel="Stylesheet" href ="../css/global.css">
    </head>
    <body>
    <header>
        <div class ="logo">
            <img src ="../images/logo.png" alt="logo">
        </div>
        <div class ="top">
            <h1>Contact sent! Redirect in progress</h1>
        </div>
    </header>
        <main>
<?php
	include("session.php");
	require_once("connection.php");
	try{
		global $pdo;
		$contacttitle = $_POST['channel'];
		$contactdesc = $_POST['desc'];
		$date = date("Y-m-d h:i:s");
		$username = $_SESSION['login_user'];

		$sql = "SELECT Id FROM Account WHERE Username = :username";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':username',$username);
                $stmt->execute();
                $results = $stmt->fetch();
                $userid = $results['Id'];
		echo "here ";
		echo $contactdesc;
		echo $contacttile;
		echo " here";
		$sqlpost = "INSERT INTO Contact (contactTitle, contactDesc, contactDate, UserId) VALUES (:contacttitle, :contactDesc, :contactdate, :userid)";
		$poststmt = $pdo->prepare($sqlpost);
		$poststmt->bindParam(':contacttitle',$contacttitle);
		$poststmt->bindParam(':contactDesc',$contactdesc);
		$poststmt->bindParam(':contactdate',$date);
		$poststmt->bindParam(':userid',$userid);
		$poststmt->execute();
	}catch(PDOException $e){
                echo $e->getMessage();
	}
	$pdo = null;
?>
	    <script>
                window.setTimeout(redir,10000);
                function redir(){
                    window.location.href ="../contact.php";
                }
            </script>
        </main>
    </body>
</html>
