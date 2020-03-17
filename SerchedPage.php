<?php
	include("php/session.php");
    $item = $_GET["searcher"];
    if ($item == "" || $item == NULL)
        $item = "Empty";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset ="UTF-8">
        <title>Search Result</title>
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href="css/SerchedPage.css">
    </head>
    <body>
        <header>
            <figure class ="heads">
                <img class = "logo" src ="images/logo.png" alt="LOGO">
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
            
            <div class="result">
                <h2>Result of <?php echo $item; ?></h2>
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
                         $stmt = $pdo->query("SELECT * FROM Post Where postTitle Like '%$item%'");
                         while ($row = $stmt->fetch()) {
                            echo "<tr>";
                                echo "<td colspan='3'><a href='post.html'>".$row['postTitle']."</a></td>";
                                echo "<td><button type='button'>Like</button>".$row['postLikes']."</td>";
                            echo "</tr>";
                         }
                    ?>
                </table>
            </div>
        </main>
        <footer>
            <a href="#">Contact Us</a>
        </footer>
    </body>
</html>