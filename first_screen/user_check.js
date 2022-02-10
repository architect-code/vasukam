$('document').ready(function(){

    var username_state = false;
    var email_state = false;
    var password_state = false;
    console.log("check1");

    $('#username').on('focus', function(){
        $('#username').css('border','none');
       
    });

    $('#password').on('focus', function(){
        $('#password').css('border','none');
        

    });

    $('#email').on('focus', function(){
        $('#email').css('border','none');
    })

    $('#password').on('blur', function(){
        $('#suggestion_box').css('display', 'none');
        var pass = $('#password').val();
        if(pass==''){
            password_state=false;
            $('#password').css('border', '2px solid red');
            return;
        }

        // password regex later /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        let regex = /^[A-Za-z\d@$!%*?&]{8,20}$/;
        let p =pass;
        if(!regex.test(p)){
            $('#error_message').css('display', 'flex');
            $('#error_message').text('Please choose a valid password');
            $('#password').css('border', '2px solid red');
            // console.log("Please enter choose a valid user name");
            return;

        }
        password_state = true;

        $("#error_message").css('display','none');
    });
   


    $('#username').on('blur', function(){
        
        var username = $('#username').val();
        // console.log(username);
        // console.log("username_check");
        if(username==''){
            username_state = false;
            $('#username').css('border', '2px solid red');
            return;
        }
  
        let regex = /^[A-Za-z\d_]{5,20}$/;
        let s = username;
        if(!regex.test(s)){
            $('#error_message').css('display', 'flex');
            $('#error_message').text('Please choose a valid user name, click on ? to see hint');
            $('#username').css('border', '2px solid red');
            $('#username').val('');
            // console.log("Please enter choose a valid user name");
            username_state = false;
            return;
        }
      
        $('#username').css('border', 'none');
        $('#error_message').css('display', 'none');
        $.ajax({
            url: "register.php",
            type: "post",
            data: {
                'username_check' : 1,
                'username' : username,
            },
            

            success: function(response){
                console.log(response.trim());
                if (response.trim() == "taken"){
                    $('#error_message').css('display', 'flex');
                    $('#error_message').text('Sorry this username is taken');   
                    $('#username').val('');
                    username_state = false;
                    // console.log(username_state);
                    // $('#username').focus();             

                }
                else if (response.trim() == "not_taken"){
                    username_state = true;
                    console.log(username_state);
                   
                    $('#error_message').css('display', 'none');
                }
                // console.log(username_state);
            }
        });
    });



    $('#email').on('blur', function(){
        $('#suggestion_box').css('display', 'none');
        
        var email_data = $('#email').val();
        if(email_data ==''){
            email_state = false;
            // $('#email').focus();
            $('#email').css('border', '2px solid red');
            // $('#error_message').css('display', 'flex');
            // $('#error_message').append('Please type email first');
            return;
        }

        // $('#error_message').css('display', 'none');
        // console.log(email_data);
        

        let regex =  /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        let e = email_data;
        if(!regex.test(e)){
            $('#error_message').css('display', 'flex');
            $('#error_message').text('Please choose a valid email');
            $('#email').css('border', '2px solid red');
            email_state = false;
            // console.log("Please enter choose a valid user name");
            return;
        }
        $('#error_message').css('display', 'none');
        $('#email').css('border', 'none');

        $.ajax({
            url : "register.php",
            type: "post",
            data: {
                'email_check': 1,
                'email': email_data,

            },

            success: function(response){
                // console.log(response);
                if (response.trim() == 'taken'){
                    email_state =false;
                    $('#error_message').css('display', 'flex');
                    $('#error_message').text('Sorry this email is taken');
                    $('#email').val('');
                    email_state = false;
                    // $('#email').focus();
                }

                else if (response.trim() == "not_taken"){
                    email_state=true;
                    $('#error_message').css('display', 'none');
                    // $('#username').focus();
                }
            }
        });
    });

    $('#signup1').on('click', function(){
        console.log('sub clicked');
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        console.log('sub clicked 2');
        console.log(username_state);
        console.log(password_state);
        console.log(email_state);
        if (email_state == false || username_state == false || password_state == false) {
            $('#error_message').css('display', 'flex');
            $('#error_message').text('Please fix the errors');
            console.log('sub clicked error');

        }
        
        else{
            $('#error_message').css('display', 'none');
            $('#error_message').text('');
            console.log('sub clicked error');
            
            $.ajax({
                url: 'register.php',
                type: 'post',
                data: {
                    'save' :1,
                    'email': email,
                    'username': username,
                    'password': password,
                },

                success: function(response){
                    console.log(response);
                    if(response.trim() == "saved"){
                        // console.log("done2");
                        $('#action_part').load('signup2.html', function() {
                            document.getElementsByClassName("one_top_bar")[0].style.display = "none";
                     
                    
                        });
                    }


                }
            });
        }
    });



});