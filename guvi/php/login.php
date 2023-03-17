<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'guvidb');
   $db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_DATABASE, DB_USERNAME, DB_PASSWORD);
   $error = array();
   $res = array();
$statement = $db->prepare("select * from login where email = :email");
$statement->execute(array(':email' => $_POST['email']));
$row = $statement->fetchAll(PDO::FETCH_ASSOC);
if (count($row) > 0) {
    if (strcmp($_POST['password'], $row[0]['password'])) {
        $error[] = "Password is not valid";
        $resp['msg'] = $error;
        $resp['status'] = false;
        echo json_encode($resp);
        exit;
    }
    else
    {
        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> 
                  Login Successfully  
           </div>';	
    }
    
} else {
    $error[] = "Email does not match";
    $resp['msg'] = $error;
    $resp['status'] = false;
    echo json_encode($resp);
    exit;
}