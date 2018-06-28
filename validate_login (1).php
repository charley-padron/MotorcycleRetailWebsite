<?php
    
    SESSION_START();

    $user=$_POST['username'];  
    $pass=$_POST['password'];
    
    if (!$user || !$pass) {     
        echo 'You have not entered credentials.';     
    exit;  } 
    
    //Connect to DB
    @ $db = new mysqli('localhost','padronc1_connect','connectData','padronc1_KneeDrag');

    if (mysqli_connect_errno()) {    
        echo 'Error: Could not connect to database.  Please try again later.';     exit;  }

    //protect sql injections
    $user = stripslashes($user);    
    $pass = stripslashes($pass);
    $user = mysqli_real_escape_string($db, $user);
    $pass = mysqli_real_escape_string($db, $pass);
    
    $pass = md5($pass);
    
    $result = mysqli_query($db, "SELECT * FROM WebLogin WHERE userName = '$user' and password = '$pass'") or die("Failed to query.");
    
    $row = mysqli_num_rows($result);
    
    if($row == 1){
        
        $_SESSION["logged"] = true;

        header("Location: ecommerce.php");

    }
    else{
 
        echo "Failure to login!";

    }
    
    $result->free();    
    $db->close();

?>