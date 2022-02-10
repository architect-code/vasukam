function show_other_user(other_user){
    // console.log("clicked");
    var other_user_id =  other_user.firstElementChild.innerHTML;
    // console.log(other_user_id);
    $.ajax({
        url: "profile/other_profile_check.php",
        type: "post",
        data: {
            'other_profile_check': 1,
            'other_user_id': other_user_id,
        },

        success: function(response){
            console.log(response);
            if(response.trim() == "save"){
                location.href = "profile/other_user_profile_friend.php";

            }

            else{
                console.log("some error occured");
                alert("some error occured");
            }
     
        }

    });
    
}
