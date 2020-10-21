$("document").ready(function(){
    if(localStorage.getItem("GUVI user")){
        $.ajax({
            url:"./sessions/session.php",
            type:"POST",
            data:{
                id:localStorage.getItem("GUVI user"),
                email:localStorage.getItem("GUVI email")
            },
            success:function(res){
              // console.log(res);
              location.href="./profile.php";
            }
        });
    }
    $(".loader").fadeOut(400);
    $(".signin").css("display","none");
    $("body").css("display","block");

    // registration process
    $("#signup-btn").click(function(e){
        e.preventDefault();
        var name = $("#name").val();
        var email = $("#email").val();
        var pwd = $("#pwd").val();
        var rePwd = $("#rePwd").val();
        if(pwd!=rePwd){
            $(".err").text("Password and confirm password not matched.");
        }else if(name.length<3 || email.length<5){
            $(".err").text("Fill details properly.");
        }else if(pwd.length<4){
            $(".err").text("Password shoud be morethan 3 charecters.");
        }
        else{
            $(this).prop("disabled",true);  
            $(".loader").css("display","block");
            $.ajax({
                url:"./routes/signup.php",
                type:"POST",
                data:{
                    signup:true,
                    name,
                    email,
                    pwd
                },
                success:function(res){
                    res = res.trim();
                    console.log(res);
                    if(res=="exist"){
                        alert("Email Id exist");
                    }else if(res=="inserted"){
                        alert("Account created successfully");
                        $(".signup").fadeOut();
                        $(".signin").fadeIn();
                    }else{
                        alert("Something went wrong! Try again");
                    }
                    $(".loader").css("display","none");
                    $(this).prop("disabled",false);
                }
            });
        }
    });

    $("#signin-btn").click(function(e){
        e.preventDefault();
        var email = $("#s-email").val();
        var pwd = $("#s-pwd").val();
        if(email.length<3 || pwd.length<4){
            $(".err").text("Invalid details.");
        }else{
            $(".loader").css("display","block");
            $(this).prop("disabled",true);
            $.ajax({
                url:"./routes/signin.php",
                type:"POST",
                data:{
                    signin:true,
                    email,
                    pwd
                },
                success:function(res){
                    console.log(res);
                    if(res.trim()=="valid"){
                            localStorage.setItem("GUVI email",email);
                            setTimeout(()=>location.href = "./profile.php",1000);
                    }else{
                        $(".err").text("Invalid Username/Password");
                    }
                    $(".loader").css("display","none");
                    $(this).prop("disabled",false);   
                }
            });
        }
    });
});
