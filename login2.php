<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>サインイン</title>
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
</head>
<body>
<h1>情報入力</h1>
<form action="" method="post">
<label>username<input type="text" name="username" size="30" required></label>


<input type='submit' name='login' value=' ログイン '>
</form>

</body>
</html>

<form action="formtest1.php" method="post">
    <input type="submit" name="back" value="戻る" />
  
</form>

<?php

class login1{


if(isset($_POST['back'])) {
 
header("location: formtest1.php");
      
}

if(isset($_POST['login'])) {
     $USER= 'yusho2';
    $PW= 'password';
    $dnsinfo= "mysql:dbname=yusho1;host=localhost;charset=utf8";
    
      try{
        $pdo = new PDO($dnsinfo,$USER,$PW);
       
        $sql2 = "select * from friends where username=?";
    	$stmt2 = $pdo->prepare($sql2);
        $array2 = array($_POST['username']);
    	$res2 = $stmt2->execute($array2);
    	$count2=$stmt2->rowCount();
    	
      if($count2==1){     
        header("location: kaiin1.php");
        }
         else{
         echo $count2;
         }	
        

    }catch(Exception $e){
        $res = $e->getMessage();
    }  

    }  
}
?>