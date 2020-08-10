<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>マイページ</title>
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
<link rel="stylesheet" href="form1.css">
</head>
<body bgcolor=#CCFFFF>
<h3 class="test1">自作Twitter風サービス</h3>
</body>
</html>

<form action="kaiin1.php" method="post">
    
    <input type="submit" name="follow" value="フォロー一覧" />
    <input type="submit" name="follower" value="フォロワー一覧" />
    <input type="submit" name="search" value="ユーザーをさがす" />
    <input type="submit" name="allusers" value="全ユーザー一覧" />
    

</form>

<form action="kaiin1.php" method="post">
    <input type="submit" name="post" value="投稿する" />
    <input type="submit" name="mypost" value="投稿一覧" />
     <input type="submit" name="timeline" value="タイムラインを見る" />
</form>

<form action="kaiin1.php" method="post">
<input type="submit" name="back" value="ログアウト" />
</form>


<?php
session_start();
    $USER= 'yusho2';
    $PW= 'password';
    $dnsinfo= "mysql:dbname=yusho2;host=localhost;charset=utf8";
    
       
        try{
        $pdo = new PDO($dnsinfo,$USER,$PW);
        }catch( PDOException $error ){
       echo "接続失敗:".$error->getMessage();
      die();
       }
        $sql2 = "select * from friends where username=?";
    	$stmt2 = $pdo->prepare($sql2);
        $array2 = array($_SESSION['username']);
    	$res2 = $stmt2->execute($array2);  
    	$result = $stmt2->fetch();  
    	$name=$result['name'];
    	$_SESSION['id']=$result['id'];

echo "ようこそ";
echo $name;
echo "さん<br />";


if(isset($_POST['follow'])) {
 
header("location: follow.php");    

} else if(isset($_POST['follower'])) {

header("location: follower.php");
}
 else if(isset($_POST['search'])) {

header("location: search.php");
}

 else if(isset($_POST['allusers'])) {

header("location: allusers.php");
}
 else if(isset($_POST['post'])) {
header("location: post.php");
}
 else if(isset($_POST['mypost'])) {
header("location: mypost.php");
}
 else if(isset($_POST['timeline'])) {
header("location: timeline.php");
}
else if(isset($_POST['back'])) {
unset($_SESSION['name']);
header("location: login.php");
}
else if($name=='') {

header("location: login.php");
}

?>