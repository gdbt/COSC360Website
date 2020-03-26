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
							$sql1 = "SELECT * FROM Post WHERE channelId = :channelid";
							$stmt = $pdo->prepare($sql1);
							$stmt->bindParam(':channelid',$cid);
							$stmt->execute();
							echo "<table>";
								echo "<thead><tr><th>Post Id</th><th>Post Likes</th><th>Post Title</th><th>Post Date</th><th>User Id</th><th>Channel Id</th></tr></thead>";
								echo "<tbody>";
									while($row = $stmt->fetch()){
										$postid = $row['postId'];
										$postLikes = $row['postLikes'];
										$posttitle = $row['postTitle'];
										$postdate = $row['postDate'];
										$userid = $row['UserId'];
										$channelid = $row['channelId'];
										echo "<tr><td>$postid</td><td>$postLikes</td><td>$posttitle</td><td>$postdate</td><td>$userid</td><td>$channelid</td></tr>";
									}
								echo "</tbody>";
                                                	echo "</table>";
							echo "<form action ='channelpostadmin.php' method='post'>";
                                                                echo "<label for='delete'>Enter a Post Id to delete from system.</label>";
                                                                echo "<input type='text' name ='delete'>";
								echo "<input type='hidden' name ='cid' value = $cid>";
                                                                echo "<input type='submit' name='submit' value ='Submit'>";
                                                        echo "</form>";
                                                        if (isset($_POST['submit'])){
                                                                $texty = $_POST['delete'];
                                                                $delsql = "DELETE FROM Post WHERE postId = :post";
                                                                $delstmt = $pdo->prepare($delsql);
                                                                $delstmt->bindParam(':post',$texty);
                                                                $delstmt->execute();
                                                                echo "<p>Post Deleted, Please refresh page to update list.</p>";
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
