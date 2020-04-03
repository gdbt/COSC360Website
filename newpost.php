<?php
	include("php/session.php");
	if(!isset($_SESSION['login_user'])){
                header("location:login.html");
                die();
        }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>New Post</title>
        <meta charset ="UTF-8">
        <link rel ="stylesheet" href="css/info.css">
	<script src="JS/newpost.js"></script>
    </head>
    <body>
        <header>
            <div class ="logo">
                <img src ="images/logo.png" alt ="logo">
            </div>
            <div class ="top">
                <h1>About Us</h1>
            </div>
            <div class="header-right">
                <ul>
                    <li><a href="MainLoggedin.php">Home</a></li>
                    <li><a href = "main.php">Front Page</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                    <li><a href="profile.php">Profile</a></li>
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
                <div id="top">
                    <h2>Create a new post!.</h2>
                </div>
                <div class ="maininfo">
			<form name ="postmake" method ="post" action ="php/newpost.php" onsubmit="return validateForm()">
                        	<label for="postt">Post Title:</label><br>
				<input type ="text" id="postt" name="posttitle" placeholder ="Post Title"><br>
				<label for="postd">Post Description:</label><br>
				<textarea id="postd" name="postdesc" rows="6" cols="50" placeholder ="Post Description"></textarea><br>
				<?php
				$id = $_POST['cid'];
				echo"<input type ='hidden' name ='channelid' value='$id'>";
				?>
			<input type="Submit" value="Create!">
                    </form>
                </div>
            </div>
        </main>
        <footer>
 		<a href = "contact.php">Contact us</a><br>
            <a href = "RequestPage.html">Request a New Channel</a>
        </footer>
    </body>
</html>
