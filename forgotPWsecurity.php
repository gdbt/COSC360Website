<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Recovery Question</title>
        <meta charset="UTF-8">
        <link rel="Stylesheet" href ="css/global.css">
            <script src="JS/passwordchange.js"></script>
    </head>
    <body>
        <header>
            <div class ="logo">
                <img src ="images/logo.png" alt="logo">
            </div>
            <div class ="top">
                <h1>Recovery Question</h1>
            </div>
            <div class="header-right">
                <ul>
                    <li><a href="main.php">Front Page</a></li>
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
                <h3>Please answer your security question and the desired password you would like.</h3>

		<?php
			require_once("php/connection.php");
			try{
				global $pdo;
				$username = $_GET['username'];
				$sql = "SELECT SecurityQ FROM Account WHERE username = :username";
				$stmt = $pdo->prepare($sql);
				$stmt->bindParam(':username',$username);
				$stmt->execute();
				$result = $stmt->fetch();
				$securityq = $result['SecurityQ'];
				if($securityq == ""){
					echo "<script>alert('Please pick a valid username!')</script>";
					echo "<script>window.location.replace('../ForgotPW.html')</script";
				}
				else{
					$secqarray = array("null","What was the house number and street name you lived in as a child?","What were the last four digits of your childhood telephone number?","What primary school did you attend?","In what town or city was your first full time job?","In what town or city did you meet your spouse/partner?","What is the middle name of your oldest child?");
					$i = 0;
					for($i;$i<7;$i++){
						if($i == $securityq){
							echo "<p>$secqarray[$i]</p>";
						}
					}
					$grab['user'] = $username;
				}
			}catch(PDOException $e){
			        
			}
                ?>
		<form name ="secanswer" method="post" action="php/changepass.php" onsubmit="return valsecurity()">
                    <label for="getsecanswer">Security Answer</label>
                    <br>
                    <input type="text" id="getsecanswer" name="securityanswer" placeholder="Answer here">
		    <?php echo "<input type='hidden' name='user' value='$username'>"; ?>
                    <br>
		    <label for="getpass">Enter desired password.</label>
                    <br>
                    <input type="password" id="getpass" name="newpass">
		    <br>
		    <label for="getpassconf">Confirm new password</label>
                    <br>
                    <input type="password" id="getpassconf" name="newpassconf">
		    <br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </main>
        <footer>
            <a href = "contact.php">Contact us</a><br>
        </footer>
    </body>
</html>
