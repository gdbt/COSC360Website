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
            <h1>Post Created! Redirect in progress</h1>
        </div>
    </header>
        <main>
<?php
	include("session.php");
	require_once("connection.php");
	try{
		global $pdo;
		$posttitle = $_POST['posttitle'];
		$postdesc = $_POST['postdesc'];
		$channelid = $_POST['channelid'];
		$date = date("Y-m-d h:i:s");
		$username = $_SESSION['login_user'];

		$sql = "SELECT Id FROM Account WHERE Username = :username";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':username',$username);
                $stmt->execute();
                $results = $stmt->fetch();
                $userid = $results['Id'];

		$sqlpost = "INSERT INTO Post (postLikes, postTitle, postDescription, postDate, UserId, channelId) VALUES (0, :posttitle, :postdesc, :date, :userid, :channelid)";
		$poststmt = $pdo->prepare($sqlpost);
		$poststmt->bindParam(':posttitle',$posttitle);
		$poststmt->bindParam(':postdesc',$postdesc);
		$poststmt->bindParam(':date',$date);
		$poststmt->bindParam(':userid',$userid);
		$poststmt->bindParam(':channelid',$channelid);
		$poststmt->execute();
	}catch(PDOException $e){
                echo $e->getMessage();
	}
	$pdo = null;
?>
	    <script>
                window.setTimeout(redir,1000);
                function redir(){
                    window.location.href ="../main.php";
                }
            </script>
        </main>
    </body>
</html>
