<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Channel Main</title>
        <link rel="stylesheet" href="css/global.css">
        <link rel="stylesheet" href ="css/ChannelMain.css">
        <script>
            const qString = window.location.search;
            console.log(qString);
            const urlParams = new URLSearchParams(qString);
            const topic = urlParams.get('topic'); 
            
        </script>
    </head>

    <body>
        <header>
            <a href="main.html"><img src="images/logo.png" alt="LOGO"></a>
            <ul class="header-right">
                <li><a href="MainLoggedin.html">#HOME</a></li>
                <li><a href="logout.html">Log Out</a></li>
                <li><a href="profile.html">Profile</a></li>
            </ul>
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

            <div id="table">
                <figure>
                    <script>
                        document.write("<img id='topBar' src='images/categoryimg/"+topic+".jpg' alt='HIGHLIGHT-IMG'>");
                        document.write("<figcaption>#"+topic+"</figcaption>");
                    </script>
                </figure>
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
                    <tr>
                    <?php
                    require_once('connection.php');
                    try{
                    global $pdo;
                    $topic=$_GET['topic'];
                    $sql="SELECT "; //add sql 
                    $data = $pdo -> query ( $sql) -> fetchAll();
                    foreach ($data as $row){
                        echo "<td colspan='3'><a href='post.html'>".$row['title']."</a></td>"; // post address
                        echo "<td><button type='button'>Like</button>".$row['like']."</td>";
                    }
                    }catch(PDOException $e){
                        echo $e->getMessage();
                    }
                    ?>
                    </tr>
                    <!-- <tr>
                        <td colspan="3"><a href="post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></td>
                        <td><button type="button">Like</button>123</td>
                    </tr>
                    <tr>
                        <td colspan="3"><a href="post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></td>
                        <td><button type="button">Like</button>123</td>
                    </tr>
                    <tr>
                        <td colspan="3"><a href="post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></td>
                        <td><button type="button">Like</button>123</td>
                    </tr>
                    <tr>
                        <td colspan="3"><a href="post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></td>
                        <td><button type="button">Like</button>123</td>
                    </tr>
                    <tr>
                        <td colspan="3"><a href="post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></td>
                        <td><button type="button">Like</button>123</td>
                    </tr>
                    <tr>
                        <td colspan="3"><a href="post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></td>
                        <td><button type="button">Like</button>123</td>
                    </tr>
                    <tr>
                        <td colspan="3"><a href="post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></td>
                        <td><button type="button">Like</button>123</td>
                    </tr>
                    <tr>
                        <td colspan="3"><a href="post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></td>
                        <td><button type="button">Like</button>123</td>
                    </tr>
                    <tr>
                        <td colspan="3"><a href="post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></td>
                        <td><button type="button">Like</button>123</td>
                    </tr>
                    <tr>
                        <td colspan="3"><a href="post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></td>
                        <td><button type="button">Like</button>123</td>
                    </tr>
                    <tr>
                        <td colspan="3"><a href="post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></td>
                        <td><button type="button">Like</button>123</td>
                    </tr>
                    <tr>
                        <td colspan="3"><a href="post.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></td>
                        <td><button type="button">Like</button>123</td>
                    </tr> -->
                </table>
            </div>
        </main>

        <footer>
            <a href="#">Contact Us</a>
        </footer>
    </body>
</html>
