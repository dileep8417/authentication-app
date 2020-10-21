<?php
    if(isset($_POST['id'])){
        session_start();
        $_SESSION['id'] = $_POST['id'];
        $_SESSION['email'] = $_POST['email'];
    }
?>