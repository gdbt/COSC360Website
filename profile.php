<?php 
	include("php/session.php"); 
	require_once('php/connection.php');
                try{
                        global $pdo;
                        $username = $_SESSION['login_user'];
                        $sql = "SELECT Username,Gender,accountDesc,Interests,Likes FROM Account WHERE Username = :username";
                        $stmt = $pdo->prepare($sql);
			$stmt->bindParam(':username',$username);
                        $stmt->execute();
                        $results = $stmt->fetch();
			$accountdesc = $results['accountDesc'];
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
        <script>
            var user = "Hayeon";
            var postcount = 23;
            var likes = 236;
        </script>
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
                    <li><a href="MainLoggedin.html">Home</a></li>
                    <li><a href ="main.html">Front Page</a></li>
                    <li><a href="logout.html">Log Out</a></li>
                </ul>
            </div>
        </header>
        <main>
            <div id="quickLink"> 
                <ul>
                <li><a href ="about.html">#ABOUT</a></li>
				<li><a href ="rules.html">#RULE</a></li>
				<li><a href ="ChannelMain.html?topic=cat">#CAT</a></li>
				<li><a href ="ChannelMain.html?topic=dog">#DOG</a></li>
				<li><a href ="ChannelMain.html?topic=fish">#FISH</a></li>
				<li><a href ="ChannelMain.html?topic=pokemon">#POKEMON</a></li>
				<li><a href ="ChannelMain.html?topic=tree">#TREE</a></li>
				<li><a href ="ChannelMain.html?topic=ubco">#UBC</a></li>
				<li><a href ="ChannelMain.html?topic=sfu">#SFU</a></li>
				<li><a href ="ChannelMain.html?topic=okcollege">#OKCollege</a></li>
				<li><a href ="ChannelMain.html?topic=laptop">#LAPTOP</a></li>
				<li><a href ="ChannelMain.html?topic=social">#SOCIAL</a></li>
				<li><a href ="ChannelMain.html?topic=phone">#PHONE</a></li>
				<li><a href ="ChannelMain.html?topic=weed">#WEED</a></li>
				<li><a href ="ChannelMain.html?topic=games">#GAMES</a></li>
                </ul>
            </div>
            <div id="center">
		<div class="achievements">
                 <table>
                       <caption>Achievements</caption>
                        <tbody>
                            <tr><td><img src="images/achievements/accountmade.png" height ="50" alt ="achievement"></td>
                                <td><img src="images/achievements/firstcomment.png" height ="50" alt ="achievement"></td>
                                <td><img src="images/achievements/firstpost.png" height="50" alt ="achievement"></td></tr>
                       </tbody>
                    </table>
                </div>
                <div class ="profilepic">
                    <img src="images/profilepics/Hayeon.jpg" alt="profile Picture">
                </div>
                <div id=desc>
                    <?php
			echo "<h2><u>$username</u></h2>";
			echo "<p>$accountdesc</p"
			?>
                </div>
                <br>
                <div class ="interests">
                    <h3>Interests</h3>
                    <p>Dogs,cats,trees,car tricks, pokemon go</p>
                </div>
                <div class ="stats">
                   <script>
                        document.write("<h3>Likes: "+likes+"</h3>");
                        document.write("<h3>Posts: "+postcount+"</h3>");
                    </script>';
                </div>';
            </div>
        </main>
        <footer>
            <a href = "#">Contact us</a><br>
            <a href = "RequestPage.html">Request a New Channel</a>
        </footer>
    </body>
</html>
