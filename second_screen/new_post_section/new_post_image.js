// $( document ).ready(function() {

var heading_state = false;
var image_state = false;
var post_heading ="";
var fd = new FormData();
console.log("no error here");
// $('#error_message').css('display', 'none');
            $('#where_button').on('click', function(){

                $('#pop_up_body_group').load('new_post_section/new_post_pop_up_groups.php', function(){
                    console.log("done");
                    document.getElementById("pop_up_body_group").style.display = "block";
            });
                
            });

            console.log("no error here2");

            var loadFile = function(event) {
                var upload = document.getElementById("post_image_file");
                if(upload.value != "")
                { 
                console.log("file file added");
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);
                image_state = true;
                fd = new FormData();
                var files = $('#post_image_file')[0].files[0];
                fd.append('file', files);
                // console.log(fd);
                    
            }
            //     else{
            //         console.log("no file added");
            // }
            // console.log(fd);
            };

  

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
    // fd.append('heading',post_heading);
       heading_state = true;

       console.log("head_valid");

    }


});




        $('#post_four_post').on('click', function(){


        if (heading_state == false || image_state == false) {
            console.log("not valid");
            console.log("Please fill heading and upload an image");
            // $('#error_message').css('display', 'flex');
            // $('#error_message').text('Please fill both heading and text');

        }
        else{
            // console.log(fd);
            // $('#error_message').css('display', 'none');

            fd.append('post_save',1);
            fd.append('heading',post_heading);

            console.log("no error before ajax call");
            
            $.ajax({
                url: 'new_post_section/new_post_image.php',
                type: 'post',
                contentType: false,
                processData: false,
                data: fd,


                success: function(response){
                    console.log(response);
                    if(response.trim() == "post_save"){
                
                        location.href = "second_screen.php";
                         // document.getElementById("pop_up_body").innerHTML="";
                        // document.getElementById("pop_up_body").style.display="none";

                    }
                    else{
                        alert('some error occured');

                        setTimeout(function(){location.href = "second_screen.php";},10);
                        // document.getElementById("pop_up_body").innerHTML="";
                        // document.getElementById("pop_up_body").style.display="none";
                        // location.href = "second_screen.php";

                    }
                    
                  
                

                }
            });
        }
    });

// });

    function go_back(){
        console.log("goback");
        document.getElementById("pop_up_body").innerHTML="";
        document.getElementById("pop_up_body").style.display="none";
        // location.href = "second_screen.php";
    }

