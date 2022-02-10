$( document ).ready(function() {
    console.log("not loaded yet");
  


    $('#text_post').on('click', function(){

        // console.log("text clicked");
        $.ajax({
                url: "new_post_section/new_post.php",
                type: "post",
                data: {
                    'post_text_check' : 1,
                    'post_type' : "T",
                },
    
                success: function(response){
                    if(response = "post_set"){
                        console.log("response");
                        // $('body').load('new_post_section/newpost_Text.php');
                        document.getElementById("pop_up_body").innerHTML="";
                        $('#pop_up_body').load('new_post_section/newpost_Text.php');
                    }
    
                    else if(response = "failed"){
    
                        console.log("some error occured please login");
                    }}
    });
    
    });
    
    
        $('#image_post').on('click', function(){
            $.ajax({
                url: "new_post_section/new_post.php",
                type: "post",
                data: {
                    'post_image_check' : 1,
                    'post_type' : "I",
                },
    
                success: function(response){
                    if(response = "post_set"){
                        console.log("response");
                        // $('body').load('new_post_section/newpost_Image.php');
                        document.getElementById("pop_up_body").innerHTML="";
                        $('#pop_up_body').load('new_post_section/newpost_Image.php');
                    }
    
                    else if(response = "failed"){
    
                        console.log("some error occured please login");
                    }}
    });
    
        
        
        });
    
    $('#video_post').on('click', function(){
    
    
    
        $.ajax({
                url: "new_post_section/new_post.php",
                type: "post",
                data: {
                    'post_video_check' : 1,
                    'post_type' : "V",
                },
    
                success: function(response){
                    if(response = "post_set"){
                        console.log("response");
                        document.getElementById("pop_up_body").innerHTML="";
                        $('#pop_up_body').load('new_post_section/newpost_Video.php');
                    }
    
                    else if(response = "failed"){
    
                        console.log("some error occured please login");
                    }}
    });
    
    });
        
});
