<?php
	include("php/session.php");
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset ="UTF-8">
	<title>Main Page</title>
	<link rel ="stylesheet" href ="css/mainpage.css">
	<script src="JS/main.js"></script>
</head>
<body>
	<header>
		<figure class ="heads">
			<img src ="images/logo.png" alt = "Logo">
		</figure>
		<div class = "header-right">
			<ul>
				<?php 
					$username = $_SESSION['login_user'];
					if ( $username == "" || $username == NULL ){
						echo "<li> Hello $username<li>";
						echo "<li><a href ='profile.html'>Profile</a></li>";
						echo "<li><a href ='logout.php'>Log out</a></li>";
					}
					else {
						echo "<li><a href ='login.html'>Login</a></li>";
						echo "<li><a href ='SignUp.html'>Sign Up</a></li>";
					}
					
				?>
			</ul>
		</div>
	</header>
	<main>
		<div class ="leftsidebar">
			<h4>Quick Links</h4>
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

		<div class ="rightsidebar">
			<h3>Daily Cat</h3> 
			<figure class ="dailycat">
				<img src ="images/dailycat/cat.jpg" alt = "cat pic">
			</figure>
			<h3>Daily Fact</h3>
			<p>Nobody really knows where the dwemer civilization went.</p>
		</div>


		<div class ="center">
			<div class ="centerpeice">
				<figure class ="figimg">
					<img id ="pic1" src ="images/categoryimg/gamessq.png" alt = "pic1">
					<img id ="pic2" src ="images/categoryimg/cat.jpg" alt="pic2">
					<img id ="pic3" src ="images/categoryimg/pokemonsq.jpg" alt="pic3">
					<img id ="pic4" src ="images/categoryimg/dog.jpg" alt="pic4">
					<img id ="pic5" src ="images/categoryimg/ubcosq.jpg" alt="pic5">
				</figure>
			</div>
			<div class ="searchbar">
				<form id ="Search" action = "SerchedPage.php"  method ="GET"> 
					<input type ="text" id ="searcher" placeholder ="Search something">
					
				</form>	
					<button id="subbutt" onclick="myFunction()">Search</button>
				
			</div>
		</div>

		
	</main>
	<footer>
		<div>
			<a href = "#">Contact Us!</a>
		</div>
	</footer>
</body>
</html>
