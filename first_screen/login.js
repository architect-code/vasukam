// $('document').ready(function(){
    var username_state = false;
    var password_state = false;
    // console.log("check1");


    $('#username').on('focus', function(){
        $('#username').css('border','none');
    })

    $('#password').on('blur', function(){
        // $('#suggestion_box').css('display', 'none');
        var pass = $('#password').val();
        if(pass==''){
            password_state=false;
            $('#password').css('border', '2px solid red');
            return;
        }

        password_state = true;

        $("#error_message").css('display','none');
    });
   


    $('#username').on('blur', function(){

        var username = $('#username').val();
        if(username==''){
            username_state = false;


            $('#username').css('border', '2px solid red');
            
            return;
        }

      
        $('#username').css('border', 'none');
        $.ajax({
            url: "login.php",
            type: "post",
            data: {
                'username_check' : 1,
                'username' : username,
            },
            

            success: function(response){
               
                if (response.trim() == "not_exist"){
                    $('#error_message').css('display', 'flex');
                    $('#error_message').text('No such username exists');   
                    $('#username').val('');
                   
                }
                else if (response.trim() == "exist"){
                    username_state = true;
                   
                    $('#error_message').css('display', 'none');
                }
            }
        });
    });



    $('#login').on('click', function(){
        var username = $('#username').val();
    
        var password = $('#password').val();
        if (username_state == false || password_state==false) {
            $('#error_message').text('Please fix the errors');

        }
        else{
            $.ajax({
                url: 'login.php',
                type: 'post',
                data: {
                    'save' :1,
              
                    'username': username,
                    'password': password,
                },

                success: function(response){
               
                    if(response.trim() == "login"){
                        
                        location.href = "../second_screen/second_screen.php";
           
                    }

                    else if(response.trim() == "error"){
                        alert("wrong password please try again");
                        wait(3000);
                        document.getElementsByClassName("one_top_bar")[0].style.display = "none";
                        location.href = "first_screen.php";
                    }

                }
            });
        }
    });



// });