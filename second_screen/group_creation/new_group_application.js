var group_name_state = false;
var group_des_state = false;
var grp_name = "";
var grp_des = "";


$('#grp_name').on('blur', function(){
    console.log("check begin");

    grp_name = $('#grp_name').val();
    if(grp_name==''){
        group_name_state = false;


        $('#grp_name').css('border', '2px solid red');
        
        return;
    }

  
    $('#grp_name').css('border', 'none');
   
    $.ajax({
        url: "new_group_application.php",
        type: "post",
        data: {
            'group_name_check' : 1,
            'grp_name' : grp_name,
            
        },
        

        success: function(response){
            console.log(response);
           
            if (response.trim() == "not_exist"){
                group_name_state = true;
               
                $('#ng_error_message').css('display', 'none');
               
               
            }
            else if (response.trim() == "exist"){
                group_name_state = false;
                $('#ng_error_message').css('display', 'flex');
                $('#ng_error_message').text('Group with same name exists');   
                $('#grp_name').val('');
                $('#grp_name').css('border', '2px solid red');
                
            }
        }
    });
});


$('#gp_des').on('blur', function(){
    console.log("check begin");

    grp_des = $('#gp_des').val();
    if(grp_des==''){
        group_des_state = false;

        $('#gp_des').css('border', '2px solid red');
        return;
    }

    else{
        group_des_state = true;

    }

});


$('#submit').on('click', function(){
    if (group_name_state == false || group_des_state==false) {
        $('#ng_error_message').css('display', 'flex');
        $('#ng_error_message').text('Please fix the errors');

    }
    else{
        var image_number = Math.floor(Math.random() * (20) + 1);
        var image_url = "random_image/art"+image_number.toString()+".jpg";
        console.log(image_url);
        // alert("hold");
        
        $('#ng_error_message').css('display', 'none');
        $.ajax({
            url: 'new_group_application.php',
            type: 'post',
            data: {
                'grp_save' :1,
          
                'grp_name': grp_name,
                'grp_des': grp_des,
                'image_url': image_url,
            },

            success: function(response){
                console.log(response);
                if(response.trim()=="save"){
                    location.href = "../profile/other_user_profile_group.php";
                }
                else{
                    location.href = "../second_screen.php"
                }
            }
        });
    }
});

