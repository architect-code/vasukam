// function other_user_profile(){
//     console.log("friend clicked");
//     console.log(this.innerHTML);
// }

$(document).ready(function(){

    $('.load_friend_profile').on('click', function(){
        console.log("clciked");
        var friend =$(this);
        var user_id = friend.children('.friend_user_id').text();
        console.log(user_id);
        $.ajax({
            url: "profile/other_profile_check.php",
            type: "post",
            data: {
                'other_profile_check': 1,
                'other_user_id': user_id,
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


    });
});
    
    