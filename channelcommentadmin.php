<!DOCTYPE html>
<html lang="en">
	<head>
		<title>about Us</title>
        	<meta charset ="UTF-8">
        	<link rel ="stylesheet" href="css/info.css">
		<link rel ="stylesheet" href="css/admin.css">
	</head>
	<body>
		<header>
			<div class ="logo">
                		<img src ="images/logo.png" alt ="logo">
            		</div>
            		<div class ="top">
                		<h1>Admin</h1>
            		</div>
            		<div class="header-right">
                		<ul>
                    			<li><a href = "main.php">Return to main</a></li>
                		</ul>
            		</div>
		</header>
		<main>
			<div id="center">
				<?php
				$cid = $_POST['cid'];
				echo "<form name='adminoption' action ='channelpostadmin.php' method='post'>";
					echo "<button type='submit' id='1'>Posts</button>";
					echo "<input type='hidden' name ='cid' value = $cid>";
				echo "</form>";
				echo "<form name='adminoption' action ='channelcommentadmin.php' method='post'>";
                                        echo "<button type='submit' id='2'>Comments</button>";
					echo "<input type='hidden' name ='cid' value = $cid>";
                                echo "</form>";
				
					include("php/session.php");
					require_once("php/connection.php");
					try{
						global $pdo;
						$username = $_SESSION['login_user'];
						$sql = "SELECT Id FROM Account WHERE Username = :username";
						$stt = $pdo->prepare($sql);
						$stt->bindParam(':username',$username);
						$stt->execute();
						$res = $stt->fetch();
						$isadmin = $res['Id'];

						
						$csql = "SELECT channelAdmin FROM Channel WHERE Channelid = :cid";
                                                $cstt = $pdo->prepare($csql);
                                                $cstt->bindParam(':cid',$cid);
                                                $cstt->execute();
                                                $cres = $cstt->fetch();
                                                $cadmin = $cres['channelAdmin'];
						if($cadmin == $isadmin){
							echo $cadmin;
							echo $isadmin;
							echo $cid;
							$sql1 = "SELECT postId FROM Post WHERE channelId = :channelid";
							$stmt = $pdo->prepare($sql1);
							$stmt->bindParam(':channelid',$cid);
							$stmt->execute();
							echo "<table>";
								echo "<thead><tr><th>Comment Id</th><th>Comment</th><th>Comment Date</th><th>User Id</th><th>Post Id</th></tr></thead>";
								echo "<tbody>";
									while($postrow = $stmt->fetch()){
										$posty = $postrow['postId'];
										$commentsql = "SELECT * FROM Comment WHERE postId = :postid";
										$commentstmt = $pdo->prepare($commentsql);
										$commentstmt->bindParam(':postid',$posty);
										$commentstmt->execute();
										while($row = $commentstmt->fetch()){
											$commentid = $row['commentId'];
											$comment = $row['comment'];
											$commentdate = $row['commentDate'];
											$userid = $row['UserId'];
											$postid = $row['postId'];
											echo "<tr><td>$commentid</td><td>$comment</td><td>$commentdate</td><td>$userid</td><td>$postid</td></tr>";
										}
									}
								echo "</tbody>";
                                                	echo "</table>";
							echo "<form action ='channelcommentadmin.php' method='post'>";
                                                                echo "<label for='delete'>Enter a Post Id to delete from system.</label>";
                                                                echo "<input type='text' name ='delete'>";
								echo "<input type='hidden' name ='cid' value = $cid>";
                                                                echo "<input type='submit' name='submit' value ='Submit'>";
                                                        echo "</form>";
                                                        if (isset($_POST['submit'])){
                                                                $texty = $_POST['delete'];
                                                                $delsql = "DELETE FROM Comment WHERE commentId = :comid";
                                                                $delstmt = $pdo->prepare($delsql);
                                                                $delstmt->bindParam(':comid',$texty);
                                                                $delstmt->execute();
                                                                echo "<p>Comment Deleted, Please refresh page to update list.</p>";
                                                        }
						}else{
							echo "<script>window.location.replace('main.php');</script>";
						}
					}catch(PDOException $e){
					}
				?>
			</div>
		</main>
		<footer>
		</footer>
	</body>
</html>
