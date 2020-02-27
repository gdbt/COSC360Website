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
            <img src ="images/logo.png" alt="logo">
        </div>
        <div class ="top">
            <h1>Successfully sent! Redirect in progress</h1>
        </div>
    </header>
        <main>
<?php
require_once('connection.php');
try{
        global $pdo;
	$username = $_GET['username'];
	$password = $_GET['password'];
	$gender = $_GET['gender'];
	$interests = $_GET['interest'];
	$accountdesc = $_GET['description'];
	$securityq = $_GET['security_question'];
	$securitya = $_GET['security_answer'];
	$likes = 0;
	echo $username;
        $sql = "INSERT INTO Account (Username, Password, Gender, AccountDesc,Interests, SecurityQ, SecurityA, Likes, ServerAdmin) values (:username, :password, :gender, :accountdesc,:interests,:securityq,:securitya,:likes,false);";
        $stmt = $pdo->prepare($sql);
	$stmt->bindParam(':username',$username);
	$stmt->bindParam(':password',$password);
	$stmt->bindParam(':gender',$gender);
	$stmt->bindParam(':accountdesc',$accountdesc);
	$stmt->bindParam(':interests',$interests);
	$stmt->bindParam(':securityq',$securityq);
	$stmt->bindParam(':securitya',$securitya);
	$stmt->bindParam(':likes',$likes);
        $stmt->execute();
        echo "new user added";
}catch(PDOException $e){
        echo $e->getMessage();
}
$pdo = null;
?>
<script>
                window.setTimeout(redir,1500);
                function redir(){
                    window.location.href ="../main.html";
                }
            </script>
        </main>
    </body>
</html>
