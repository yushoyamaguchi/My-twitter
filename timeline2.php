<form action="follower.php" method="post">

    <input type="submit" name="back" value="–ß‚é" />
</form>


<?php
 session_start();
   $id=$_SESSION['id'];
   //echo $id;
 
    $USER= 'yusho2';
    $PW= 'password';
    $dnsinfo= "mysql:dbname=yusho1;host=localhost;charset=utf8";
         try{
        $pdo = new PDO($dnsinfo,$USER,$PW);
        }catch( PDOException $error ){
       echo "Ú‘±Ž¸”s:".$error->getMessage();
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
       $sql3 = "select * from timelines where whom=$id2 order by id desc";
     $stmt2 = $pdo->prepare($sql2);
     $stmt2->execute();
     $stmt3 = $pdo->prepare($sql3);
     $stmt3->execute();     
     $result2 = $stmt2->fetch( PDO::FETCH_ASSOC );
  
    while( $result3 = $stmt3->fetch( PDO::FETCH_ASSOC ) ){
    
    echo "\t<tr>\n";
    echo "\t\t<td>{$result3['comment']}</td>\n";
 
    echo "\t</tr>\n";
   }
   }
  echo "</table>\n";
 
 if(isset($_POST['back'])) {
  //unset($_SESSION['id']);
  
  //unset($_SESSION['name']);
  header("location: kaiin1.php");    
 
 }
  ?> 