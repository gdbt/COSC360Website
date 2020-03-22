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
        <!-- <?php
            require_once("php/connection.php");             
            global $pdo;
            try{

            }catch(PDOException $e){
            }
            $pdo = null;
        ?> -->
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
                    <li><a href="MainLoggedin.html">Home</a></li>
                    <li><a href="main.html">Front Page</a></li>
                    <li><a href="logout.html">Log Out</a></li>
                    <li><a href="profile.html">Profile</a></li>
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
                <div class ="profileinfo">
                    <figure>
                        <img src ="images/profilepics/Hayeon.jpg" alt ="profile picture">
                        <figcaption>
                            <script>
                                document.write("<h2><u>@"+user+"</u></h2>");
                            </script>
                        </figcaption>
                    </figure>
                    <p>lorem ipsem mortelm void indictus sanctum apollo</p>
                </div>

                <div class ="postinfo">
                    <div class ="mainpost">
                        <h2>Should Bananas be banned?</h2>
                        <p class ="posttest">
                            Bananas are an ungodly fruit and should ultimately
                            be banned from this earth. If we all band together we can end this
                            awful tyrrant and cripple of the fruit industry. Sign my petition
                            to show your support
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
                                        
                                        require_once("php/connection.php");
                                        global $pdo;
                                        try{
                                            $query = $_SERVER['QUERY_STRING'];
                                            echo $query;
                                            echo "<br>";
                                            $pid = explode("=", $query);
                                            echo $pid[1];
                                            $postId = (int)$pid[1];
                                            echo "<br>";
                                            echo $postId;
                                            $stmt = $pdo->query("SELECT UserId, comment FROM Comment Where postid = $postId");
                                            while ($row = $stmt->fetch()) {
                                                $userId = $row["UserId"];
                                                $comment = $row["comment"];
                                                echo "<br>"."user id :".$row['UserId'];
                                                $stmt2 = $pdo->query("SELECT Username FROM Account Where id = $userId");
                                                $row2 = $stmt2->fetch();
                                                $username = $row2['Username'];
                                                echo "<br>"."user name :".$username;
                                                echo "<tr><th>$username</th></tr>";
                                                echo "<tr><td>$comment</td></tr>";
                                            }
                                        }catch(PDOException $e){
                                        }
                                        $pdo = null; 
                                        
                                    ?>
                                    
                                    <form name = addcomment action="php/addcomment.php" method ="get">
                                    <tr><th>Write Your Commont</th></tr>
                                    <tr><td><textarea name = "nwcommomt"></textarea>
                                        
                                        <?php
                                            echo "<input type='hidden' name='postId' value = ".$postId.">";
                                        ?>                              
                                        
                                    </td></tr>
                                    <tr><td><input type="submit" value="Submit"></td></tr>
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
