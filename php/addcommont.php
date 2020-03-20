<?php
include("php/session.php");
require_once('connection.php');
try{
        global $pdo;
    $nwcommont = $_GET['nwcommomt'];
    $postid = $Get['postid'];
    $username = $_SESSION['login_user'];
    $stmt = $pdo->query("SELECT Id FROM Account Where Username = $username ");
    $stmt->execute();
    $userId = $stmt -> fetch();
	echo $username;
        $sql = "INSERT INTO Comment (comment, commentDate, UserId, postId) values (:comment, :commentdate, :userid, :postid);";
        $stmt = $pdo->prepare($sql);
	$stmt->bindParam(':comment',$nwcommont);
	$stmt->bindParam(':commentdate',date("Y-m-d"));
	$stmt->bindParam(':userid',$userId);
	$stmt->bindParam(':postid', $postid);
        $stmt->execute();
        echo "new commont added";
}catch(PDOException $e){
        echo $e->getMessage();
}
$pdo = null;
?>

<script>
    window.setTimeout(redir,1500);
    function redir(){
        window.history.back();
    }
</script>