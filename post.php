<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>投稿</title>
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
</head>
<form action="" method="post">

		<div>
			<label for="t_message">contents</label>
			<textarea id="t_message" name="contents"  cols="40" rows="10"></textarea>
		</div>

<input type='submit' name='post' value=' 投稿する '>
</form>
</body>
</html>

<form action="search.php" method="post">
    <input type="submit" name="back" value="戻る" />
    
  
</form>
<?php



session_start();
$id=$_SESSION['id'];
    $USER= 'yusho2';
    $PW= 'password';
    $dnsinfo= "mysql:dbname=yusho2;host=localhost;charset=utf8";
         try{
        $pdo = new PDO($dnsinfo,$USER,$PW);
        }catch( PDOException $error ){
       echo "接続失敗:".$error->getMessage();
      die();
       }
       
if(isset($_POST['post'])){
        
    	$sql = "INSERT INTO timelines (comment,whom) VALUES(?,?)";
    	$stmt = $pdo->prepare($sql);
        $array = array($_POST['contents'],$id);
    	$res = $stmt->execute($array);
}

if(isset($_POST['back'])) {
unset($_SESSION['id']);
header("location: kaiin1.php");
}
?>