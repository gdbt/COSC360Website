<?php
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <title>Logged Out</title>
        <meta charset="UTF-8">
        <link rel="Stylesheet" href ="css/global.css">
    </head>
    <body>
    <header>
        <div class ="logo">
            <img src ="images/logo.png" alt="logo">
        </div>
        <div class ="top">
            <h1>Logged out, Redirect in progress</h1>
        </div>
    </header>
        <main>

            <script>
                window.setTimeout(redir,1500);
                function redir(){
                    window.location.href ="main.php";
                }
            </script>
        </main>
    </body>
</html>
