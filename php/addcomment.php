<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Post Creation</title>
        <meta charset="UTF-8">
        <link rel="Stylesheet" href ="../css/global.css">
    </head>
    <body>
    <header>
        <div class ="logo">
            <img src ="../images/logo.png" alt="logo">
        </div>
        <div class ="top">
            <h1>Comment Created! Redirect in progress</h1>
        </div>
    </header>
        <main>
<?php
        include("session.php");
        require_once('connection.php');
        try{
                global $pdo;
                $nwcommont = $_GET['nwcommomt'];
                $postId = $_GET['postId'];
                $date = date("Y-m-d h:i:s");
                $username = $_SESSION['login_user'];
        
                $stmt = $pdo->query("SELECT Id FROM Account Where Username = '$username' ");
                $stmt->execute();
                $result = $stmt -> fetch();
                $userId = $result[0];
                echo $username;
                $sql = "INSERT INTO Comment (comment, commentDate, UserId, postId) values (:comment, :commentdate, :userid, :postid);";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':comment',$nwcommont);
                $stmt->bindParam(':commentdate',$date);
                $stmt->bindParam(':userid',$userId);
                $stmt->bindParam(':postid', $postId);
                $stmt->execute();
                echo "new commont added";
                }catch(PDOException $e){
                        echo $e->getMessage();
        }
        $pdo = null;
?>

<script>
    window.setTimeout(redir,1000);
    function redir(){
        window.location.href ="../post.php?postId=<?php echo $postId ?>";
    }
</script>
</main>
</body>
</html>