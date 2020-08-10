<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>テスト</title>
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
 
</head>
<body bgcolor=#CCFFFF>
<h1>情報入力</h1>
<form action="" method="post">
<label>username<input type="text" name="username" size="30" required></label>


<input type='submit' name='regist' value=' 登録 '>
</form>

</body>
</html>


<?php



if(isset($_POST['regist'])){
   
    $USER= 'yusho2';
    $PW= 'password';
    $dnsinfo= "mysql:dbname=yusho1;host=localhost;charset=utf8";
    try{
        $pdo = new PDO($dnsinfo,$USER,$PW);
        
        $sql2 = "select * from japtest2 where name=?";
    	$stmt2 = $pdo->prepare($sql2);
        $array2 = array($_POST['username']);
    	$res2 = $stmt2->execute($array2);
    	$count=$stmt2->rowCount();
    	
    	
    if($count>0){
    echo "already exist";
    
    }
    else{
    	$sql = "INSERT INTO japtest2 (name) VALUES(?)";
    	$stmt = $pdo->prepare($sql);
        $array = array($_POST['username']);
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