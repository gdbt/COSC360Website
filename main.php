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
					require_once("php/connection.php");
					$username = $_SESSION['login_user'];
					if ( $username != "" || $username != NULL ){
						echo "<li> Hello $username<li>";
						echo "<li><a href ='profile.php'>Profile</a></li>";
						echo "<li><a href ='logout.php'>Log out</a></li>";
					}
					else {
						echo "<li><a href ='login.html'>Login</a></li>";
						echo "<li><a href ='SignUp.html'>Sign Up</a></li>";
					}
					global $pdo;
					try{
						$sql = "SELECT ServerAdmin FROM Account WHERE Username = :username";
						$stmt = $pdo->prepare($sql);
						$stmt->bindParam(':username',$username);
						$stmt->execute();
						$results = $stmt->fetch();
						$isadmin = $results['ServerAdmin'];
						if($isadmin == 1){
							echo "<li><a href ='mainaccountadmin.php'>Admin</a></li>";
						}
					}catch(PDOException $e){
						echo $e->getMessage();
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
					<input type ="text" id ="searcher" name = "searchr" placeholder ="Search something">
					<input type ="hidden" id="sorting" name = "sort" value = "hot">
					<input type="submit" value="Submit" onclick="myFunction()">
				</form>
			</div>
		</div>
	</main>
	<footer>
		<div>
			<a href = "contact.php">Contact Us!</a>
		</div>
	</footer>
</body>
</html>
