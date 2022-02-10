

$(document).ready(function(){

$('.upvote').on('click', function(){
    console.log("upvoted");
    var up =$(this);
    var up_color = up.css('color');
    var num_likes = up.siblings('.num_likes');
    var down = up.siblings('.downvote');
    var main_color = num_likes.css('color');
    var post_id = up.siblings('.post_data_id').html();
    console.log(post_id);
    
    if(main_color === 'rgb(255, 255, 255)'){

        
        console.log("everything Fine");
        $.ajax({
            url: "home_section/post_interaction_local.php",
            type: "post",
            data: {
                'post_vote_check_up': 1,
                'type': 'U',
                'post_id': post_id,
            },

            success: function(response){
                console.log(response);
                if(response.trim() == "save"){
                    up.css('color', 'red');
                num_likes.css('color', 'red');
                num_likes.html(function(i, val) { return +val+1 });

                }

                else{
                    console.log("some error occured");
                }
         
            }

        });


    }

    else if(main_color === 'rgb(255, 0, 0)'){
        console.log("removing red");
        
        $.ajax({
            url: "home_section/post_interaction_local.php",
            type: "post",
            data: {
                'post_vote_un_check_up': 1,
                'post_id': post_id,
            },

            success: function(response){
                console.log(response);
                if(response.trim() == "save"){
                    up.css('color', 'white');
        num_likes.css('color', 'white');
        num_likes.html(function(i, val) { return +val-1 });
                }

                else{
                    console.log("some error occured");
                }
              
            }

        });

    }
    else if( main_color === 'rgb(0, 0, 255)'){
        
        $.ajax({
            url: "home_section/post_interaction_local.php",
            type: "post",
            data: {
                'post_vote_check_up_final': 1,
                'type': 'U',
                'post_id': post_id,
            },

            success: function(response){
                console.log(response);
                if(response.trim() == "save"){
                    up.css('color', 'red');
                    num_likes.css('color', 'red');
                    num_likes.html(function(i, val) { return +val+2 });
                    console.log("everything Fine");
                    down.css('color', 'white');

                }

                else{
                    console.log("some error occured");
                }
         
            }

        });
        
    

    }



});





$('.downvote').on('click', function(){
    console.log("downvoted");
    var down = $(this);
    var down_color = down.css('color');
    var num_likes = down.siblings('.num_likes');
    var up = down.siblings('.upvote');
    var main_color = num_likes.css('color');
    var post_id = down.siblings('.post_data_id').html();
    console.log(post_id);
    
    if(main_color === 'rgb(255, 255, 255)'){

        
        $.ajax({
            url: "home_section/post_interaction_local.php",
            type: "post",
            data: {
                'post_vote_check_down': 1,
                'type': 'D',
                'post_id': post_id,
            },

            success: function(response){
                console.log(response);
                if(response.trim() == "save"){
                    down.css('color', 'blue');
        num_likes.css('color', 'blue');
        num_likes.html(function(i, val) { return +val-1 });

                }

                else{
                    console.log("some error occured");
                }
           
            }

        });


    }
    else if(main_color === 'rgb(0, 0, 255)'){
        
       
        $.ajax({
            url: "home_section/post_interaction_local.php",
            type: "post",
            data: {
                'post_vote_un_check_down': 1,
                'post_id': post_id,
            },

            success: function(response){
                console.log(response);
                if(response.trim() == "save"){
                    down.css('color', 'white');
                    num_likes.css('color', 'white');
                    num_likes.html(function(i, val) { return +val+1 });

                }

                else{
                    console.log("some error occured");
                }
              
            }

        });

    }
    else if(main_color === 'rgb(255, 0, 0)'){
        
        $.ajax({
            url: "home_section/post_interaction_local.php",
            type: "post",
            data: {
                'post_vote_un_check_down_final': 1,
                'type': 'D',
                'post_id': post_id,
            },

            success: function(response){
                console.log(response);
                if(response.trim() == "save"){
                    down.css('color', 'blue');
        num_likes.css('color', 'blue');
        up.css('color', 'white')
        num_likes.html(function(i, val) { return +val-2 });

                }

                else{
                    console.log("some error occured");
                }
              
            }

        });

    }


});


$('.ten_heading, .ninteen_content').on('click', function(){
    console.log("clicked");
    var box = $(this);    
    var post_id = box.siblings('.meta_post_id').html();
    console.log(post_id);
    $.ajax({
        url: "home_section/post_interaction_local.php",
        type: "post",
        data: {
            'post_click_check': 1,
            'post_id': post_id,
        },

        success: function(response){
            console.log(response);
            document.getElementById("pop_up_body").innerHTML = "";
            $('#pop_up_body').load('home_section/unique_post.php', function() {
            console.log("new post launched");
            document.getElementById("pop_up_body").style.display="flex";
     
        });
    }

    });

});

});
  