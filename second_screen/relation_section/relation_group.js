// function other_user_profile(){
//     console.log("friend clicked");
//     console.log(this.innerHTML);
// }

$(document).ready(function(){
    console.log("group clicked");

    $('.load_group_profile').on('click', function(){
        console.log("clciked");
        var group =$(this);
        var group_id = group.children('.group_group_id').text();
        console.log(group_id);
        $.ajax({
            url: "profile/other_profile_check.php",
            type: "post",
            data: {
                'group_check': 1,
                'group_group_id': group_id,
            },

            success: function(response){
                console.log(response);
                if(response.trim() == "save"){
                    location.href = "profile/other_user_profile_group.php";

                }

                else{
                    console.log("some error occured");
                    alert("some error occured");
                }
         
            }

        });


    });
});
    
function create_new_group(){
    console.log("button_clicked");
    location.href = "group_creation/new_group_application.html";
}
    