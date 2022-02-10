
console.log("no error here");


$( document ).ready(function() {
// $('#error_message').css('display', 'none');
            $('#where_button').on('click', function(){

                $('#pop_up_body_group').load('new_post_section/new_post_pop_up_groups.php', function(){
                console.log("done");
                document.getElementById("pop_up_body_group").style.display = "block";
            
            });
                
            });

            console.log("no error here2");

    var heading_state = false;
    var content_state = false;
    var post_heading ="";
    var post_content=""

var placeholder_head = "Enter post heading..."; //Change this to your placeholder text
$("#post_six_heading").on('click', function() {
    if ($(this).text() == placeholder_head) {
        $(this).text("");
    }});

    $("#post_six_heading").on('blur', function() {

        if (!$(this).text().length) {
        $(this).text(placeholder_head);
        heading_state = false;
       
    
    
    }
    else{
    post_heading = $(this).text();
       heading_state = true;

       console.log("head_valid");

    }


});

  

    var placeholder_text = "Enter post text..."; //Change this to your placeholder text
$("#post_seven_body").on('click', function() {
    if ($(this).text() == placeholder_text) {
        $(this).text("");
    }});
    $("#post_seven_body").on('blur', function() {

        if (!$(this).text().length) {
        $(this).text(placeholder_text);
        content_state = false;
      
    
    }

    else{
        post_content = $(this).text();
        content_state = true;
    
        console.log("content_valid");
    }





});


        $('#post_four_post').on('click', function(){
            console.log(content_state);
            console.log(heading_state);

        if (heading_state == false || content_state == false) {
            console.log("Please fill both heading and text");
            alert("Hello! I am an alert box!!");
            // $('#error_message').css('display', 'flex');
            // $('#error_message').text('Please fill both heading and text');

        }
        else{
            console.log("valid");
            console.log(post_heading);
            console.log(post_content);
            // $('#error_message').css('display', 'none');
            $.ajax({
                url: 'new_post_section/new_post_text.php',
                type: 'post',
                data: {
                    'post_save' : 1,
                    'heading': post_heading,
                    'post_content': post_content,
                },

                success: function(response){
                    console.log(response);
                    if(response.trim() == "post_save"){
                        
                        location.href = "second_screen.php";
                        // document.getElementById("pop_up_body").innerHTML="";
                        // document.getElementById("pop_up_body").style.display="none";

                    }
                    else{
                        alert("some error occured");
                        wait(3000);
                        document.getElementById("pop_up_body").innerHTML="";
                        document.getElementById("pop_up_body").style.display="none";
                        location.href = "second_screen.php";

                    }
      
                }
            });
        }
    });

});

    function go_back(){
        console.log("goback");
        document.getElementById("pop_up_body").innerHTML="";
        document.getElementById("pop_up_body").style.display="none";
        // location.href = "second_screen.php";
    }



// }).focusout(function() {
//     if (!$(this).text().length) {
//         $(this).text(placeholder);
//     }
// });
