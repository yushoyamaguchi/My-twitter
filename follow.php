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

     $sql = "select * from follows where from_id=$id";
     $stmt = $pdo->prepare($sql);
     $stmt->execute();
     
 
  echo "<table>\n";
    echo "\t<tr><th>Follow</th></tr>\n";
    $i=0;
  while( $result = $stmt->fetch( PDO::FETCH_ASSOC ) ){
    $id2=$result['to_id'];
       $sql2 = "select * from friends where id=$id2";
     $stmt2 = $pdo->prepare($sql2);
     $stmt2->execute();
     $result2 = $stmt2->fetch( PDO::FETCH_ASSOC );
    
    
    echo "\t<tr>\n";
    echo "\t\t<td>{$result2['name']}</td>\n";

  // $_SESSION['id']=$result2['id'];
    //echo '<a href="profile.php?$_SESSION['id']='.$result2['id'].'">'.$result2['name'].'</a><br />';

    echo "\t</tr>\n";
   }
  echo "</table>\n";
 
 if(isset($_POST['back'])) {
  //unset($_SESSION['id']);
  
  //unset($_SESSION['name']);
  header("location: kaiin1.php");    
 
 }
  ?> 
