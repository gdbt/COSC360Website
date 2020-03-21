<?php 
	include("php/session.php"); 
	require_once('php/connection.php');
                try{
                        global $pdo;
                        $username = $_SESSION['login_user'];
                        $sql = "SELECT Id,Username,Gender,accountDesc,Interests,Likes FROM Account WHERE Username = :username";
                        $stmt = $pdo->prepare($sql);
			$stmt->bindParam(':username',$username);
                        $stmt->execute();
                        $results = $stmt->fetch();
			$accountdesc = $results['accountDesc'];
			$interest = $results['Interests'];
			$likes = $results['Likes'];
			$gender = $results['Gender'];
			$id = $results['Id'];
			echo $id;

			$achsql = "SELECT AchievementName FROM Achievements,Account WHERE Achievements.accountId = Account.Id and Account.Id = :id;";
			$achstmt = $pdo->prepare($achsql);
			$achstmt->bindParam(':id',$id);
			$achstmt->execute();

		}catch(PDOException $e){
                        echo $e->getMessage();
                }
?>
<!DOCTYPE html>
<html lang ="en">
    <head>
        <title>Profile</title>
        <meta charset="UTF-8">
        <link rel="Stylesheet" href ="css/global.css">
        <link rel="Stylesheet" href ="css/profile.css">
    </head>
    <body>
        <header>
            <div class ="logo">
                <img src ="images/logo.png" alt="logo">
            </div>
            <div class ="top">
                <h1>Profile</h1>
            </div>
            <div class="header-right">
                <ul>
                    <li><a href="MainLoggedin.php">Home</a></li>
                    <li><a href ="main.php">Front Page</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </div>
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
            <div id="center">
		<div class="achievements">
                 <table>
                       <caption>Achievements</caption>
                        <tbody>
				<?php
					echo "<tr>";
					$rowy = 0;
					while($row = $achstmt->fetch()){
						$achname = $row['AchievementName'];
						if($rowy == 3){
							echo "</tr><tr>";
							$rowy = 0;
						}
						echo "<td><img src='images/achievements/$achname' height='50' alt ='achievement'></td>";
						$rowy = $rowy + 1;
					}
					echo "</tr>";
				?>
                       </tbody>
                    </table>
                </div>
                <div class ="profilepic">
                    <img src="images/profilepics/Hayeon.jpg" alt="profile Picture">
                </div>
                <div id=desc>
                    <?php
			echo "<h2><u>$username</u></h2>";
			echo "<p>$accountdesc</p";
			?>
                </div>
                <br>
                <div class ="interests">
                    <h3>Interests</h3>
			<?php
                    		echo "<p>$interest</p>";
			?>
                </div>
                <div class ="stats">
                   <?php
				echo "<h3>Likes: $likes</h3>";
				echo "<h3>Posts: 0</h3>";
			?>
                </div>
            </div>
        </main>
        <footer>
            <a href = "#">Contact us</a><br>
            <a href = "RequestPage.html">Request a New Channel</a>
        </footer>
    </body>
</html>
