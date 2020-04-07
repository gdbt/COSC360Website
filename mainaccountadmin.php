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
							$opt = $_GET['optpick'];
							$sql1 = "SELECT Id, Username, Gender FROM Account";
							$sql2 = "SELECT * FROM Post";
							$sql3 = "SELECT * FROM Channel";
							$stmt = $pdo->prepare($sql1);
							$stmt->execute();
							echo "<table>";
								echo "<thead><tr><th>User Id</th><th>Username</th><th>Gender</th></tr></thead>";
								echo "<tbody>";
										while($row = $stmt->fetch()){
											$id = $row['Id'];
											$username = $row['Username'];
											$gender = $row['Gender'];
											echo "<tr><td>$id</td><td>$username</td><td>$gender</td></tr>";
										}
								echo "</tbody>";
                                                	echo "</table>";
							echo "<form action ='mainaccountadmin.php' method='post'>";
								echo "<label for='delete'>Enter an Id to delete from system.</label>";
								echo "<input type='text' name ='delete'>";
								echo "<input type='submit' name='submit' value ='Submit'>";
							echo "</form>";
							if (isset($_POST['submit'])){
								$texty = $_POST['delete'];
								$delsql = "DELETE FROM Account WHERE Id = :user";
								$delstmt = $pdo->prepare($delsql);
								$delstmt->bindParam(':user',$texty);
								$delstmt->execute();
								echo "<p>User Deleted, Please refresh page to update list.</p>";
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
