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
				<form name='adminoption' action ='mainaccountadmin.php' method='post'>
					<button type="submit" id="1">Accounts</button>
				</form>
				<form name='adminoption' action ='mainpostadmin.php' method='post'>
                                        <button type="submit" id="2">Posts</button>
                                </form>
				<form name='adminoption' action ='mainchanneladmin.php' method='post'>
                                        <button type="submit" id="3">Channels</button>
                                </form>
				<?php
					include("php/session.php");
					require_once("php/connection.php");
					try{
						global $pdo;
						$username = $_SESSION['login_user'];
						$sql = "SELECT ServerAdmin FROM Account WHERE Username = :username";
						$stt = $pdo->prepare($sql);
						$stt->bindParam(':username',$username);
						$stt->execute();
						$res = $stt->fetch();
						$isadmin = $res['ServerAdmin'];
						if($isadmin != 1){
							echo "<script>window.location.replace('main.php');</script>";
						}
						else{
							$sql1 = "SELECT * FROM Post";
							$stmt = $pdo->prepare($sql1);
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
							echo "<form action ='mainpostadmin.php' method='post'>";
                                                                echo "<label for='delete'>Enter a Post Id to delete from system.</label>";
                                                                echo "<input type='text' name ='delete'>";
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
