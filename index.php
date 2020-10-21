<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/auth.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  
    <script src="./assets/js/index.js"></script>  
    <title>GUVI Authentication</title>
    <style>
        body{
            display:none;
        }
    </style>
</head>
<div class="loader"></div>
<body>
    <nav class="navbar">
        <img class="navbar-brand" src="./assets/svg/logo.svg" alt="logo">
        <ul class="navbar-nav ml-auto">
            <li class="signup nav-item" onclick="toogle('signin')">Sign in</li>
            <li class="signin nav-item" onclick="toogle('signup')">Sign up</li>
        </ul>
    </nav>
    <div class="container">
        <!-- User Registration -->
        <?php 
            require_once "./template/signup.html";
        ?>
        <!-- User Signin -->
        <?php 
            require_once "./template/signin.html";
        ?>
    </div>
    <img src="./assets/svg/bg.svg" alt="" class="bg">    
</body>
</html>

<script>
    function toogle(category){
        if(category=="signin"){
            $(".signup").fadeOut(200);
            $(".signin").fadeIn(1000);
        }else{
            $(".signin").fadeOut(200);
            $(".signup").fadeIn(1000);
        }
    }
</script>