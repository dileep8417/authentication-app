<?php
  
    if(isset($_POST['signup'])){
        require "../config/connection.php";
        require "../operations.php";
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["pwd"];

        
        if(check_mail_existance($email)){
            echo "exist";
        }
       else{
            if(register_user($name,$email,$password)){
                echo "inserted";
            }else{
                echo "not inserted";
            }
        }
    }

?>