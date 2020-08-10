<form action="kaiin1.php" method="post">
    
    <input type="submit" name="follow" value="フォロー一覧" />
    <input type="submit" name="follower" value="フォロワー一覧" />
    <input type="submit" name="post" value="投稿一覧" />
    <input type="submit" name="back" value="戻る" />

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
        $sql2 = "select * from friends where id=?";
    	$stmt2 = $pdo->prepare($sql2);
        $array2 = array($_SESSION['id']);
    	$res2 = $stmt2->execute($array2);  
    	$result = $stmt2->fetch();  
    	$name=$result['name'];
    	$_SESSION['id']=$result['id'];


echo $name;
echo "さん<br />";


if(isset($_POST['follow'])) {
 
header("location: login.php");    

} else if(isset($_POST['follower'])) {

header("location: login.php");
}
else if(isset($_POST['post'])) {

header("location: login.php");
}

else if(isset($_POST['back'])) {
unset($_SESSION['name']);
header("location: login.php");
}

?>