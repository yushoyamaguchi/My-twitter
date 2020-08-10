<form action="follower.php" method="post">

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

     $sql = "select comment from timelines where whom=$id order by id desc";
     $stmt = $pdo->prepare($sql);
     $stmt->execute();
   
     

  
 
  echo "<table>\n";
  echo "\t<tr><th>Comment</th></tr>\n";
 
  

  
 
 
 while( $result = $stmt->fetch( PDO::FETCH_ASSOC ) ){
 

 
     echo "\t<tr>\n";
    echo "\t\t<td>{$result['comment']}</td>\n";
    echo "\t</tr>\n";   
    
    
    echo "\t<tr>\n";
    echo "\t\t<td>-----------------------------</td>\n";
    echo "\t</tr>\n";
   

 }
 
   echo "</table>\n";

 if(isset($_POST['back'])) {
  //unset($_SESSION['id']);
  
  //unset($_SESSION['name']);
  header("location: kaiin1.php");    
 
 }
  ?>