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

     $sql = "select to_id from follows where from_id=$id";
     $stmt = $pdo->prepare($sql);
     $stmt->execute();
     $result=$stmt->fetchAll();
     
     for ($ii = 0 ; $ii < count($result); $ii++){
     $follow_num[$ii]=$result[$ii][0];
     }
     
    /* for ($i = 0 ; $i < count($result); $i++){
      echo $follow_num[$i];  
     }*/
     
     $sql2 = "select * from timelines where whom IN(".implode(",",$follow_num).") order by id DESC";
     $stmt2 = $pdo->prepare($sql2);
     $stmt2->execute();     
 
  echo "<table>\n";
  echo "\t<tr><th>Comment</th></tr>\n";
 
  

  
 
 
 while( $result2 = $stmt2->fetch( PDO::FETCH_ASSOC ) ){
 
     $id2=$result2['whom'];
     $sql3 = "select name from friends where id=$id2";
     $stmt3 = $pdo->prepare($sql3);
     $stmt3->execute();
     $result3 = $stmt3->fetch( PDO::FETCH_ASSOC );  
 
     echo "\t<tr>\n";
    echo "\t\t<td>user:{$result3['name']}</td>\n";
    echo "\t</tr>\n";   
   
    echo "\t<tr>\n";
    echo "\t\t<td>contents:{$result2['comment']}</td>\n";
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