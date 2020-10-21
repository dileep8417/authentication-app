<?php
    @session_start();

    function is_user(){
        if(isset($_SESSION['id'])){
           return true;
        }
        return false;
    }

    function check_mail_existance($email){
        global $conn; 
        $query = "SELECT id FROM users WHERE email=?";
        $stm = mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($stm,"s",$email);
        mysqli_stmt_execute($stm);
        $result = mysqli_stmt_fetch($stm);
        if($result>0){
            return true;
        }
        return false;
    }

    function login_user($email,$pwd){
        global $conn; 
        $query = "SELECT * FROM users WHERE email=? AND password=?";
        $stm = mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($stm,"ss",$email,$pwd);
        mysqli_stmt_execute($stm);
        $result = mysqli_stmt_get_result($stm);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            @session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            return true;
        }else{
            return false;
        }
    }

    function register_user($name,$email,$password){
        global $conn;
        $query = "INSERT INTO users(name,email,password) VALUES(?,?,?)";
        $stm = mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($stm,"sss",$name,$email,$password);
        mysqli_stmt_execute($stm);
        if($stm){
           return true;
        }
        return false;
    }

    function get_profile_data($id){
        global $conn;
        $query = "SELECT * FROM users WHERE id=?";
        $stm = mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($stm,"s",$id);
        mysqli_stmt_execute($stm);
        $result = mysqli_stmt_get_result($stm);
        $data = mysqli_fetch_assoc($result);
        return $data;
    }
    //print_r(get_profile_data(19));
   
?>