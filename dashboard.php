<?php 
    require "./config/connection.php";
    require "./operations.php";
    if(!is_user()){
        header('Location: ./index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title><?php echo "Welcome ".$_SESSION['name']?></title>
    <style>
        body{
            display:block !important;
        }
    </style>
</head>
<body>
    <div class="alert alert-primary text-center alert-dismissible fade show" role="alert">Loggedin as <?php echo $_SESSION['email']?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </div>
    
   <?php include "./template/dashboard.html"?>
</body>
</html>

<script>
    $(".logout").click(()=>{
        location.href="./sessions/logout.php";
    });
</script>

