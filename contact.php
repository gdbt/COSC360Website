<?php
if(!isset($_SESSION['login_user'])){
        header("location:login.html");
        die();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contact Page</title>
        <meta charset="UTF-8">
        <link rel="Stylesheet" href ="css/global.css">
        <link rel="Stylesheet" href ="css/requestpage.css">
        <script src="JS/request.js"></script>


    </head>
    <body>
        <header>
            <div class ="logo">
                <img src ="images/logo.png" alt ="logo">
            </div>
            <div class ="top">
                <h1>Contact us</h1>
            </div>
            <div class="header-right">
                <ul>
                    <li><a href="MainLoggedin.php">Home</a></li>
                    <li><a href="main.php">Front Page</a></li>
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
                <h3>Feel free to contact us!</h3>
                <p>If you notice any bugs, want to inform us of anything fill out the information below.</p>
                <form name ="contactmake" action="php/contact.php" method="post">
                    <label for="channel">Title</label>
                    <input type="text" name="channel" placeholder="Title">
                    <br>
                    <textarea name="desc" placeholder="Tell Us More ..." rows ="7" cols ="100"></textarea><br>
                    <input type="submit" value="Submit">
                </form>
            </div>
            </main>
            <footer>
                <a href = "contact.php">Contact us</a><br>
                <a href = "RequestPage.html">Request a New Channel</a>
            </footer>
    </body>
</html>
