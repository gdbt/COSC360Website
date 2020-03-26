<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Channel Main</title>
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href ="css/ChannelMain.css">
        <script>
            const qString = window.location.search;
            console.log(qString);
            const urlParams = new URLSearchParams(qString);
            const topic = urlParams.get('topic'); 
            
        </script>
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
                    <script>
                        document.write("<img id='topBar' src='images/categoryimg/"+topic+".jpg' alt='HIGHLIGHT-IMG'>");
                        document.write("<figcaption>#"+topic+"</figcaption>");
                    </script>
                </figure>
                <table>
                    <tr>
                        <th>Title</th>
                        <th>
                            <select>
                                <option value="">Hot</option>
                                <option value="">New</option>
                                <option value="">Most Like</option>
                                <option value="">Most Comments</option>
                            </select>
                        </th>
                        <th>Like</th>
                    </tr>
                <?php
		include("php/session.php");
        	require_once("php/connection.php");
        	global $pdo;
        	try{
			$username = $_SESSION['login_user'];
        	        $topic = $_GET['topic'];
        	        $sql = "SELECT channelId, channelAdmin FROM Channel WHERE channelName = :channel";
        	        $stmt = $pdo->prepare($sql);
        	        $stmt->bindParam(':channel',$topic);
        	        $stmt->execute();
        	        $results = $stmt->fetch();
        	        $channelid = $results['channelId'];
			$channeladmin = $results['channelAdmin'];
        	        $lsql = "SELECT postLikes, postTitle, postId FROM Post WHERE channelId = :channels";
        	        $lstmt = $pdo->prepare($lsql);
        	        $lstmt->bindParam(':channels',$channelid);
        	        $lstmt->execute();
        	        while($row = $lstmt->fetch()){
                          $pi = $row['postId'];
        	              $pl = $row['postLikes'];
        	              $pt = $row['postTitle'];
        	              echo "<tr><td><a href = 'post.php?postId=$pi'>$pt</a></td><td></td><td>$pl</td></tr>";
        	        }
			$asql = "SELECT Id FROM Account WHERE Username = :username";
			$stt = $pdo->prepare($asql);
                        $stt->bindParam(':username',$username);
                        $stt->execute();
                        $res = $stt->fetch();
                        $isadmin = $res['Id'];
			if($isadmin == $channeladmin){
				echo "<form action ='channelpostadmin.php' method='post'>";
					echo "<input type='hidden' name ='cid' value = $channelid>";
					echo "<input type ='Submit' value ='Admin'>";
				echo "</form>";
			}
        	}catch(PDOException $e){
        	}
        	$pdo = null;
		?>
                </table>
		<form name = makepost action ="newpost.php" method="post">
                        <?php echo "<input type='hidden' name ='cid' value = $channelid>"; ?>
                        <input type ="Submit" value ="Create Post!">
                </form>
            </div>
        </main>

        <footer>
            <a href="#">Contact Us</a>
        </footer>
    </body>
</html>

