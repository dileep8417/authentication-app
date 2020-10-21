$("document").ready(function(){
    
    $("body").css("display","block");
    $(".loader").css("display","none");
    $("#update-btn").click(function(e){
        e.preventDefault();
        let dob, gender, cat, mobile;
        let date = new Date($("#dob").val());
        let m,d;
        m = date.getMonth()+1;
        d = date.getDate();
        if(m<10){
            m = "0"+m;
        }
        if(d<10){
            d = "0"+d;
        }
        dob = date.getFullYear()+"-"+m+"-"+d;
        gender = $("input[name='gender']:checked").val();
        mobile = $("#mobile").val();
        cat = $("input[name='cat']:checked").val();
        console.log(dob);
        
        if(gender==undefined){
            gender = "N/A";
        }
        if(cat==undefined){
            cat = "N/A";
        }
        if(mobile.length<10 && mobile!=""){
            $(".err").text("Enter valid mobile number");
            return;
        }
        $(".loader").css("display","block");
        $.ajax({
            url:"./routes/updateprofile.php",
            type:"POST",
            data:{
                update:true,
                dob,
                mobile,
                gender,
                cat
            },
            success:function(res){
                if(res=="updated"){
                    // local storage
                    let info = {
                        "dob":dob,
                        "Mobile":mobile,
                        "Gender":gender,
                        "Category":cat
                    }
                    localStorage.setItem("GUVI Profile",JSON.stringify(info));
                    $(".err").text("Details updated");
                }
            }
        });
        $(".loader").css("display","none");
    });
});

