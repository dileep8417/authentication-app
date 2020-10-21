<?php

    require "../config/connection.php";
    @session_start();
    if(isset($_POST['update'])){
        $dob = $_POST['dob'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $cat = $_POST['cat'];
        $id = $_SESSION['id'];

        $query = "UPDATE users SET dob=?, mobile=?, category=?, gender=? WHERE id=?";
        $stm = mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($stm,"ssssi",$dob,$mobile,$cat,$gender,$id);
        mysqli_stmt_execute($stm);
        echo "updated";
    }
?>