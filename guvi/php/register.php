<?php
 $userid = $_POST['userid'];
 $email = $_POST["email"];
 $password = $_POST["password"];
 $phone=$_POST["phone"];
 define('DB_SERVER', 'localhost');
 define('DB_USERNAME', 'root');
 define('DB_PASSWORD', '');
 define('DB_DATABASE', 'guvidb');
 try {
    $db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  $q="insert into login values(:email,:userid,:phone,:password)";
  $stmt=$db->prepare($q);
  $stmt->bindParam(':email',$email);
  $stmt->bindParam(':userid',$userid);
  $stmt->bindParam(':phone',$phone);
  $stmt->bindParam(':password',$password );
  if($stmt->execute())
  {
      echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> 
                  Register Successfully  
           </div>';		
    //   header('Location: http://localhost/guvi/login.html');
  }	
  else
  {
      echo  '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> 
                  Fail to Register  
             </div>';		
  }
?>
 
 