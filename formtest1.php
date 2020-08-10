<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>ユーザー登録</title>
<!--<link rel="stylesheet" type="text/css" href="style.css" />-->
<link rel="stylesheet" href="form1.css">
</head>
<body bgcolor=#CCFFFF>
<h3 class="test1">自作Twitter風サービス</h3>
<br>

</body>
</html>
<form action="formtest1.php" method="post">
    <input type="submit" name="regist" value="新規登録" />
    <input type="submit" name="login" value="ログイン" />
</form>
<?php


if(isset($_POST['regist'])) {
 
header("location: regi1.php");
      

} else if(isset($_POST['login'])) {
 
header("location: login.php");
}

echo "ようこそ！";
?>