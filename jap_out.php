


<?php
 session_start();
   $id=$_SESSION['id'];

 
    $USER= 'yusho2';
    $PW= 'password';
    $dnsinfo= "mysql:dbname=yusho2;host=localhost;charset=utf8";
         try{
        $pdo = new PDO($dnsinfo,$USER,$PW);
        }catch( PDOException $error ){
       echo "接続失敗:".$error->getMessage();
      die();
       }

     $sql = "select * from japtest2";
     $stmt = $pdo->prepare($sql);
     $stmt->execute();
 
  echo "<table>\n";
    echo "\t<tr><th>All Users</th></tr>\n";
  while( $result = $stmt->fetch( PDO::FETCH_ASSOC ) ){
      
 

    
        echo "\t<tr>\n";
    echo "\t\t<td>name:{$result['name']}</td>\n";
    echo "\t</tr>\n";
    
        echo "\t<tr>\n";
    echo "\t\t<td>------------------------------</td>\n";
    echo "\t</tr>\n";
   }
  echo "</table>\n";
 

  ?>