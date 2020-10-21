<?php

    if(isset($_POST["signin"])){
        require "../config/connection.php";
        require "../operations.php";        
        $email = $_POST["email"];
        $pwd = $_POST['pwd'];

        if(login_user($email,$pwd)){
            echo "valid";
        }else{
            echo "invalid";
        }
        
    }

?>