<html>
<body>
<h1>ユーザー検索</h1>
<form action="" method="post">
<label>username<input type="text" name="username" size="30" required></label>


<input type='submit' name='search' value=' 検索 '>
</form>

</body>
</html>
<form action="search.php" method="post">
    <input type="submit" name="back" value="戻る" />
    
  
</form>


<?php
 session_start();
   $id=$_SESSION['id'];
   //echo $id;
 
    $USER= 'yusho2';
    $PW= 'password';
    $dnsinfo= "mysql:dbname=yusho2;host=localhost;charset=utf8";
         try{
        $pdo = new PDO($dnsinfo,$USER,$PW);
        }catch( PDOException $error ){
       echo "接続失敗:".$error->getMessage();
      die();
       }

 if(isset($_POST['search'])) {
         $sql = "select * from friends where username=?";
    	$stmt = $pdo->prepare($sql);
        $array = array($_POST['username']);
    	$res = $stmt->execute($array);
    	$result = $stmt->fetch();
    	$_SESSION['id2']=$result['id'];
    	$hit_name=$result['name'];
    	
    	$count=$stmt->rowCount();
    	
	
    	
     if($count==1){
     
    echo $hit_name;
    
        $sql3 = "select * from follows where from_id=? and to_id=?";
    	$stmt3 = $pdo->prepare($sql3);
        $array3 = array($id,$_SESSION['id2']);
    	$res3 = $stmt3->execute($array3);
    	$result3 = $stmt3->fetch();
        $count3=$stmt3->rowCount();
   
   if($count3==0) {
    echo <<<EOT
    <form action="search.php" method="post">
     <input type='submit' name='follow' value='フォロー' />
       </form>
EOT;
}
  
    else if($count3==1) {
    echo <<<EOT
    <form action="search.php" method="post">
     <input type='submit' name='unfollow' value='フォロー解除' />
       </form>
EOT;
}
        
     }
 
 }
else if(isset($_POST['back'])) {
unset($_SESSION['id']);
header("location: kaiin1.php");
}

    if(isset($_POST['follow'])) {
       echo "aaa";
        $to_follow_id=$_SESSION['id2'];
        $sql2 = "INSERT INTO follows (from_id,to_id) VALUES(?,?)";
    	$stmt2 = $pdo->prepare($sql2);
        $array2 = array($id,$to_follow_id);
    	$res2 = $stmt2->execute($array2);
    	}
    	
     else if(isset($_POST['unfollow'])) {
      
        $to_follow_id=$_SESSION['id2'];
        echo $id;
        echo "   ";
        echo $to_follow_id;
        $sql4 = "delete from follows where from_id=$id and to_id=$to_follow_id";
    	$stmt4 = $pdo->prepare($sql4);
       // $array4 = array($id,$to_follow_id);
    	//$res4 = $stmt4->execute($array4);
    	$res4 = $stmt4->execute();
    	}
 ?> 