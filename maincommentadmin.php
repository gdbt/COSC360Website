<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin</title>
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
				<form name='adminoption' action ='maincommentadmin.php' method='post'>
                                        <button type="submit" id="4">Comments</button>
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
							echo "<table>";
								echo "<thead><tr><th>Comment Id</th><th>Comment</th><th>Comment Date</th><th>User Id</th><th>Post Id</th></tr></thead>";
								echo "<tbody>";
										$commentsql = "SELECT * FROM Comment";
										$commentstmt = $pdo->prepare($commentsql);
										$commentstmt->execute();
										while($row = $commentstmt->fetch()){
											$commentid = $row['commentId'];
											$comment = $row['comment'];
											$commentdate = $row['commentDate'];
											$userid = $row['UserId'];
											$postid = $row['postId'];
											echo "<tr><td>$commentid</td><td>$comment</td><td>$commentdate</td><td>$userid</td><td>$postid</td></tr>";
										}
								echo "</tbody>";
                                                	echo "</table>";
							echo "<form action ='maincommentadmin.php' method='post'>";
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
