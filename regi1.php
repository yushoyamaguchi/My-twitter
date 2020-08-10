<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>友達登録</title>
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
 
</head>
<body bgcolor=#CCFFFF>
<h1>情報入力</h1>
<form action="" method="post">
<label>username<input type="text" name="username" size="30" required></label>
<label>fullname<input type="text" name="name" size="30" required></label>
<label>password<input type="text" name="password" size="30" required></label>

<input type='submit' name='regist' value=' 登録 '>
</form>

</body>
</html>
<form action="regi1.php" method="post">
    <input type="submit" name="back" value="戻る" />
  
</form>

<?php

echo "ユーザーネームとパスワードの入力はアルファベットでお願いします。<br />";
echo "普段使っている重要なパスワードは使わないでください。";

if(isset($_POST['back'])) {
 
header("location: formtest1.php");
     
}
if(isset($_POST['regist'])){
   
    $USER= 'yusho2';
    $PW= 'password';
    $dnsinfo= "mysql:dbname=yusho2;host=localhost;charset=utf8";
    try{
        $pdo = new PDO($dnsinfo,$USER,$PW);
        
        $sql2 = "select * from friends where username=?";
    	$stmt2 = $pdo->prepare($sql2);
        $array2 = array($_POST['username']);
    	$res2 = $stmt2->execute($array2);
    	$count=$stmt2->rowCount();
    	
    	
    if($count>0){
    echo "already exist";
    
    }
    else{
    	$sql = "INSERT INTO friends (username,name,relation,password) VALUES(?,?,?,?)";
    	$stmt = $pdo->prepare($sql);
        $array = array($_POST['username'],$_POST['name'],1,$_POST['password']);
    	$res = $stmt->execute($array);
    	echo "succes!";
    	}
    	

    	//echo "aaa";
    }catch(Exception $e){
        $res = $e->getMessage();
    }
   // echo $res;
    }
?>

