<?php
	require_once("connection.php");
	try{
		global $pdo;
   	             $username = $_POST['user'];
		     $seca = $_POST['securityanswer'];
		     $newpass = $_POST['newpass'];
                     $sql = "SELECT SecurityA FROM Account WHERE username = :username";
                     $stmt = $pdo->prepare($sql);
                     $stmt->bindParam(':username',$username);
                     $stmt->execute();
                     $result = $stmt->fetch();
                     $securitya = $result['SecurityA'];
			
			if($securitya == $seca){
				$passchangesql = "UPDATE Account SET Password = :password WHERE Username = :username";
				$passchangestmt = $pdo->prepare($passchangesql);
				$passchangestmt->bindParam(':password',$newpass);
				$passchangestmt->bindParam(':username',$username);
				$passchangestmt->execute();
				echo "<script>window.location.replace('../newpwconf.html')</script>";
			}
			else{
				echo "<script>alert('Incorrect security Answer');</script>";
				echo "<script>window.location.replace('../ForgotPW.html')</script>";
			}
	}catch(PDOException $e){
  	      
        }
?>
