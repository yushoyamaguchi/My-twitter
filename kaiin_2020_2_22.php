<form action="formtest1.php" method="post">
    <input type="submit" name="back" value="ログアウト" />
  
</form>

<?php
session_start();
    $USER= 'yusho2';
    $PW= 'password';
    $dnsinfo= "mysql:dbname=yusho1;host=localhost;charset=utf8";
    
       
        try{
        $pdo = new PDO($dnsinfo,$USER,$PW);
        }catch( PDOException $error ){
       echo "接続失敗:".$error->getMessage();
      die();
       }
        $sql2 = "select name from friends where username=?";
    	$stmt2 = $pdo->prepare($sql2);
        $array2 = array($_SESSION['username']);
    	$res2 = $stmt2->execute($array2);  
    	$result = $stmt2->fetch();  
    	$name=$result['name'];

echo "ようこそ";
echo $name;
echo "さん<br />";
echo "現在登録されているお友達は";

$sql3 = "select name from friends";
$stmt3 = $pdo->prepare($sql3);
$stmt3->execute();

echo "<table>\n";
echo "\t<tr><th>name</th></tr>\n";
while( $result = $stmt3->fetch( PDO::FETCH_ASSOC ) ){
    echo "\t<tr>\n";
    echo "\t\t<td>{$result['name']}</td>\n";
    echo "\t</tr>\n";
}
echo "</table>\n";

if(isset($_POST['back'])) {
unset($_SESSION['name']);
header("location: login.php");      
}

?>