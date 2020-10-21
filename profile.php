<?php
    require "./config/connection.php";
    require "./operations.php";
    if(!isset($_SESSION['id'])){
        header("Location: ./index.php");
    }
    $data = get_profile_data($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  
    <link rel="stylesheet" href="./assets/css/profile.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets/js/profile.js"></script>
    <title>Profile</title>
</head>
<body>
    <nav class="navbar">
        <img class="navbar-brand" src="./assets/svg/logo.svg" alt="logo">
        <ul class="navbar-nav ml-auto">
            <li class="dashboard nav-item" onclick="location.href='./dashboard.php'">Dashboard</li>
            <li class="logout nav-item">Logout</li>
        </ul>
    </nav>
    <div class="loader"></div>
    <h2 class="text-center">Welcome <span class="text-primary"><?php echo $data['name']?></span></h2>
    <form action="#" class="profile-form">
        <h4 class="center text-warning ">Update your details</h4>
        <table class="table">
            <tr>
                <th class="err text-success"></th>
            </tr>
            <tr>
                <th>Name:</th>
                <td><input type="text" value="<?php echo $data['name']?>" disabled></td>
            </tr>
            <tr>
                <th>Emai Id:</th>
                <td><input type="text" value="<?php echo $data['email']?>" disabled></td>
            </tr>
            <tr>
                <th>Mobile:</th>
                <td><input id="mobile" type="number" value="<?php echo $data['mobile']!='N/A'?$data['mobile']:""?>" placeholder="Enter your mobile number" required></td>
            </tr>
            <tr>
                <th>Date of Birth:</th>
                <td><input type="date" id="dob"></td>
            </tr>
            <tr>
                <th>Gender:</th>
                <td><input name="gender" value="male" type="radio" <?php echo $data['gender']=="male"?"checked":""?>>Male &nbsp; <input name="gender" value="female" type="radio" <?php echo $data['gender']=="female"?"checked":""?>>Female</td>
            </tr>
            <tr>
                <th>Category:</th>
                <td><input name="cat"  value="student" <?php echo $data['category']=="student"?"checked":""?> type="radio">Student &nbsp; <input name="cat" value="professional" type="radio" <?php echo $data['category']=="professional"?"checked":""?>>Professional</td>
            </tr>
            <tr>
                <td id="update-btn" class="center"><button class="btn btn-success">Update Profile</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
<script>
    $(".logout").click(()=>{
        location.href="./sessions/logout.php";
    });
   $("document").ready(function(){
        let date = "<?php echo $data['dob']?>";
        localStorage.setItem("GUVI user",<?php echo $_SESSION['id']?>);
        if(date!='N/A'){
            document.getElementById("dob").value = date;
        }
   });
</script>

