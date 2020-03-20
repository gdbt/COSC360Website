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
        <script>
            const qString = window.location.search;
            console.log(qString);
            const urlParams = new URLSearchParams(qString);
            const postid = urlParams.get('postid'); 
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
                                    <tr><th>xx_haloMaster_xx</th></tr>
                                    <tr><td>Bro what kind of drugs are you on?</td></tr>
                                    <tr><th>Hayeon</th></tr>
                                    <tr><td>NONE!</td></tr>
                                    <tr><th>xx_haloMaster_xx</th></tr>
                                    <tr><td>Get some help...</td></tr>
                                    <?php 
                                        require_once("php/connection.php");
                                        global $pdo;
                                        try{
                                            $query = $_SERVER['QUERY_STRING'];
                                            list($varN, $postid) = split("=", $query);
                                            $stmt = $pdo->query("SELECT UserId, comment FROM Comment Where postId = $postid");
                                            while ($row = $stmt->fetch()) {
                                                $stmt2 = $pdo -> query( "Select Username From Account Where id = :id");
                                                $stmt2->bindParam(':comment',$row['UserId']);
                                                $row2 = $stmt2->fetch();
                                                echo "<tr><th>$row2[Username]</th></tr>";
                                                echo "<tr><td>$row[comment]</td></tr>";
                                            }
                                        }catch(PDOException $e){
                                        }
                                        $pdo = null; 
                                    ?>
                                    <form action="addcommont.php" method ="GET">
                                    <tr><th>Write Your Commont</th></tr>
                                    <tr><td><textarea name = "nwcommomt"></textarea><input type="hidden" name="postId" value="postid"></td></tr>
                                    <tr><td><input type="submit" value="Submit" onclick="myFunction()"></td></tr>
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
