
<?php
	include('php/session.php');
	$log = isset($_SESSION['login_user']);
	if($log == false){
		header("location:login.html");
                die();
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>WEBSITE NAME</title>
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href ="css/MainLoggedin.css">
    </head>

    <body>
        <header>
            <a href="main.php"><img src="images/logo.png" alt="LOGO"></a>
            <ul class="header-right">
                <li><a href="MainLoggedin.php">#HOME</a></li>
                <li><a href="logout.php">Log Out</a></li>
                <li><a href="profile.php">Profile</a></li>
            </ul>
        </header>
        <main>
            <div id="quickLink">
                <ul>
                    <li><a href ="about.html">#ABOUT</a></li>
                    <li><a href ="rules.html">#RULE</a></li>
                    <li><a href ="ChannelMain.php?topic=cat">#CAT</a></li>
                    <li><a href ="ChannelMain.php?topic=dog">#DOG</a></li>
                    <li><a href ="ChannelMain.php?topic=fish">#FISH</a></li>
                    <li><a href ="ChannelMain.php?topic=pokemon">#POKEMON</a></li>
                    <li><a href ="ChannelMain.php?topic=tree">#TREE</a></li>
                    <li><a href ="ChannelMain.php?topic=ubco">#UBC</a></li>
                    <li><a href ="ChannelMain.php?topic=sfu">#SFU</a></li>
                    <li><a href ="ChannelMain.php?topic=okcollege">#OKCollege</a></li>
                    <li><a href ="ChannelMain.php?topic=laptop">#LAPTOP</a></li>
                    <li><a href ="ChannelMain.php?topic=social">#SOCIAL</a></li>
                    <li><a href ="ChannelMain.php?topic=phone">#PHONE</a></li>
                    <li><a href ="ChannelMain.php?topic=weed">#WEED</a></li>
                    <li><a href ="ChannelMain.php?topic=games">#GAMES</a></li>
                    </ul>
            </div>

            <div id="table">
                <figure>
                    <img id="topBar" src="images/categoryimg/pokemon.jpg" alt="HIGHLIGHT-IMG">
                    <figcaption>#Your Posts</figcaption>
                </figure>
                <table>
                    <tr>
                        <th>Sort</th>
                        <th>
                            <select>
                                <option value="">Hot</option>
                                <option value="">New</option>
                                <option value="">Most Like</option>
                                <option value="">Most Comments</option>
                            </select>
                        </th>
                        <th></th>
                        <th>Like</th>
                    </tr>
			<?php
			require_once("php/connection.php");
			global $pdo;
			try{
                        	$user = $_SESSION['login_user'];
                        	$sql = "SELECT Id FROM Account WHERE Username = :username";
                        	$stmt = $pdo->prepare($sql);
                        	$stmt->bindParam(':username',$user);
                        	$stmt->execute();
                        	$results = $stmt->fetch();
                        	$userid = $results['Id'];
                        	$lsql = "SELECT postLikes, postTitle, postId FROM Post WHERE UserId = :userid";
                        	$lstmt = $pdo->prepare($lsql);
                        	$lstmt->bindParam(':userid',$userid);
                        	$lstmt->execute();
                        	while($row = $lstmt->fetch()){
                        	  $pi = $row['postId'];
                        	      $pl = $row['postLikes'];
                        	      $pt = $row['postTitle'];
                        	      echo "<tr><td><a href = 'post.php?postId=$pi'>$pt</a></td><td></td><td>$pl</td></tr>";
                        	}
                	}catch(PDOException $e){
				$e->getMessage();
			}
			?>
                    </tr>
                </table>
            </div>
        </main>

        <footer>
            <a href="contact.php">Contact Us</a>
        </footer>
    </body>
</html>
