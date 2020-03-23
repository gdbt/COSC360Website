<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Post</title>
        <meta charset="UTF-8">
        <link rel="Stylesheet" href ="css/global.css">
        <link rel="Stylesheet" href ="css/post.css">
        <script>
            var user ="Hayeon";
        </script>
        <?php                                      
             include("php/session.php");
             require_once("php/connection.php");
             global $pdo;
             try{ 
                 $query = $_SERVER['QUERY_STRING'];
                 $pid1 = explode("=", $query);
                 $postId1 = (int)$pid1[1];
                 
                 $stmt3 = $pdo->query("SELECT UserId, postTitle, postDescription FROM Post WHERE postId = $postId1");
                 $stmt3->execute();
                 $result = $stmt3->fetch();
                 $id = $result['UserId'];
                 $title = $result['postTitle'];
                 $inside = $result['postDescription'];
                 $stmt4 =$pdo->query("SELECT Username, AccountDesc FROM Account WHERE id = $id");
                 $stmt4->execute();
                 $result2 = $stmt4->fetch();
                 $postOwner = $result2['Username'];
                 $aboutOwer = $result2['AccountDesc'];
                 
                 $stmt5 = $pdo->query("SELECT UserId, comment FROM Comment Where postId = $postId1");
                 $stmt5->execute();
                 $allUseronComment = array();
                 $allComment = array();
                 while ($row = $stmt5->fetch()) {
                    $userId = $row["UserId"];
                    $comment = $row["comment"];
                    
                    array_push($allComment,$comment);
                    $stmt6 = $pdo->query("SELECT Username FROM Account Where id = $userId");
                        $row2 = $stmt6->fetch();
                        $username = $row2['Username'];
                        array_push($allUseronComment,$username);
                 }
                                
                 
             }catch(PDOException $e){
             }
             $pdo = null;
            
        ?>
        <script>
            const qString = window.location.search;
            console.log(qString);
            const urlParams = new URLSearchParams(qString);
            const postid = urlParams.get('postId'); 
        </script>
    </head>
    <body>
        <header>
            <div class ="logo">
                <img src ="images/logo.png" alt="logo">
            </div>
            <div class ="top">
                <h1>Channel Post</h1>
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
                <div class ="profileinfo">
                    <figure>
                        <img src ="images/profilepics/<?php echo $postOwner; ?>.jpg" alt ="profile picture">
                        <figcaption>
                            <?php
                                echo "<h2><u>@".$postOwner."</u></h2>";
                            ?>
                            
                        </figcaption>
                    </figure>
                    <p><?php echo $aboutOwer; ?></p>
                </div>

                <div class ="postinfo">
                    <div class ="mainpost">
                        <h2><?php echo $title; ?></h2>
                        <p class ="posttest">
                            <?php echo $inside; ?>
                        </p>
                        <button type="button">Like</button>
                    </div>

                    <div class ="commentsection">
                        <table id =indvcomments>
                            <caption><b>Comments</b></caption>
                            <thead>
                            </thead>
                            <tbody>                            
                                    
                                    <?php

                                    $sizeOfArray = sizeof($allUseronComment);
                                    for ( $i = 0 ; $i < $sizeOfArray ; $i++){
                                        echo "<tr><th>$allUseronComment[$i]</th></tr>";
                                        echo "<tr><td>$allComment[$i]</td></tr>";
                                    }                                        
                                        
                                    ?>
                                    
                                    <form name = addcomment action="php/addcomment.php" method ="get">

                                    <?php
                                        $username = $_SESSION['login_user'];
                                        if ( $username != "" || $username != NULL ){
                                            
                                            echo "<tr><th>Write Your Commont</th></tr>";
                                            echo '<tr><td><textarea name = "nwcommomt"></textarea>';
                                            echo "<input type='hidden' name='postId' value = ".$postId1.">";
                                            echo '<tr><td><input type="submit" value="Submit"></td></tr>';
                                            
                                        }
                                    ?>
                                    </form>
                                    
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                </div>
        </main>
        <footer>
            <a href = "#">Contact us</a><br>
            <a href = "RequestPage.html">Request a New Channel</a>
        </footer>

    </body>
</html>
