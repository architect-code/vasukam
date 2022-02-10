$('document').ready(function(){
    $('#error_message').css('display', 'none');
    // console.log("chwck0");
    var name_state = false;
    var dob_state = false;
    // console.log("cehck1");
    // console.log("check1");

    $('#name').on('blur', function(){
        var name = $('#name').val();
        // console.log(username);
        // console.log("username_check");
        if(name==''){
            username_state = false;

            // $('#username').focus();
           
            // $('#error_message').text('Please type name first');
            // $('#error_message').css('display', 'flex');
            name_state = false
            return;
        }
        name_state =true;
        // $('#error_message').css('display', 'none');
        // console.log("cehckname");
      
    });



    $('#dob').on('blur', function(){
        
        var dob = $('#dob').val();
        if(dob ==''){
            dob = false;
            // $('#email').focus();
           
            // $('#error_message').text('Please type email first');
            // $('#error_message').css('display', 'flex');
            dob_state = false;
            return;
        }
        dob_state = true;

       
        // console.log("cehckdob");

        // console.log(email_data);


    });

    $('#signup2').on('click', function(){
        var name = $('#name').val();
        var dob = $('#dob').val();
        // var password = $('#password').val();
        if (name_state == false || dob_state == false) {
            $('#error_message').css('display','flex');
            $('#error_message').text('Please fix the errors');

        }
        else{
            console.log("done");
            var image_number = Math.floor(Math.random() * (20) + 1);
            var image_url = "random_image/art"+image_number.toString()+".jpg";
            $.ajax({
                url: 'add_data.php',
                type: 'post',
                data: {
                    'save' :1,
                    'name': name,
                    'dob': dob,
                    'image_url': image_url,
                    // 'password': password,
                },

                success: function(response){
                    // console.log(response);
                    if(response.trim() == "saved"){
                       
                        location.href = "../second_screen/second_screen.php";
           
                    }
                    else if(response == "error"){
                        alert("some error occured, please try to signup again");
                        wait(3000);
                        document.getElementsByClassName("one_top_bar")[0].style.display = "none";
                        location.href = "first_screen.php";
                        // redirect to error screen

                    }

                }
            });
        }
    });



});