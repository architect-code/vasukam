function go_back(){
    console.log("goback");
    location.href = "../second_screen.php";
}

function logout(){
    $.ajax({
        url: "logout.php",
        type: "post",
        data: {
            'logout_check' : 1,
        },
        

        success: function(response){
            location.href = "../../first_screen/first_screen.php";

        }
});

}

function account_setting(){
    console.log("account setting clicked");
}

function report_bug(){
    console.log("report bug clicked");
    
}
