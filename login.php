<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>サインイン</title>
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
<link rel="stylesheet" href="form1.css">
</head>

<body bgcolor=#CCFFFF>
<h1>情報入力</h1>
<form action="" method="post">
<label>username<input type="text" name="username" size="30" required></label>
<label>password<input type="password" name="password" size="30" required></label>


<input type='submit' name='login' value=' ログイン '>
</form>

</body>
</html>

<form action="formtest1.php" method="post">
    <input type="submit" name="back" value="戻る" />
  
</form>

<?php
//mysql_query('SET NAMES utf8', $sql );

session_start();
if(isset($_POST['back'])) {
 
header("location: formtest1.php");
      
}

if(isset($_POST['login'])) {
     $USER= 'yusho2';
    $PW= 'password';
    $dnsinfo= "mysql:dbname=yusho2;host=localhost;charset=utf8";
    
      try{
        $pdo = new PDO($dnsinfo,$USER,$PW);
       
        $sql2 = "select * from friends where username=?";
    	$stmt2 = $pdo->prepare($sql2);
        $array2 = array($_POST['username']);
    	$res2 = $stmt2->execute($array2);
    	$result2 = $stmt2->fetch();
    	$count2=$stmt2->rowCount();
    	
      if($count2==1){  

      if($result2['password']==$_POST['password']){
     
      $_SESSION['username']=$_POST['username']; 
        header("location: kaiin1.php");
        }
        else{
        echo "password unexactlly";
        }
        }
         else{
         echo $count2;
         }	
        

    }catch(Exception $e){
        $res = $e->getMessage();
    }  

      
}
?>