console.log("this is unique post");
$(document).ready(function(){

$('.unique_upvote').on('click', function(){
    console.log("upvoted");
    var up =$(this);
    var up_color = up.css('color');
    var num_likes = up.siblings('.num_likes');
    var down = up.siblings('.unique_downvote');
    var main_color = num_likes.css('color');
    var post_id = up.siblings('.post_data_id').html();
    // var post_in_main = document.getElementById(post_id);
    var post_in_main = $('#' + post_id);
    // console.log(post_in_main);
    var post_in_main_upvote_but = post_in_main.find('.upvote');
    var post_in_main_like_num  = post_in_main.find('.num_likes');
    var post_in_main_downvote_but = post_in_main.find('.downvote');

    // console.log(pp);
    console.log(post_id);
    
    if(main_color === 'rgb(255, 255, 255)'){

        
        console.log("everything Fine");
        $.ajax({
            url: "home_section/unique_post_interaction.php",
            type: "post",
            data: {
                'unique_post_vote_check_up': 1,
                'type': 'U',
                'post_id': post_id,
            },

            success: function(response){
                console.log(response);
                if(response.trim() == "save"){
                    up.css('color', 'red');
                    num_likes.css('color', 'red');
                    post_in_main_upvote_but.css('color', 'red');
                    post_in_main_like_num.css('color', 'red');
                    post_in_main_like_num.html(function(i, val) { return +val+1 });
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
            url: "home_section/unique_post_interaction.php",
            type: "post",
            data: {
                'unique_post_vote_un_check_up': 1,
                'post_id': post_id,
            },

            success: function(response){
                console.log(response);
                if(response.trim() == "save"){
                    up.css('color', 'white');
                    num_likes.css('color', 'white');
                    num_likes.html(function(i, val) { return +val-1 });
                    post_in_main_upvote_but.css('color', 'white');
                    post_in_main_like_num.css('color', 'white');
                    post_in_main_like_num.html(function(i, val) { return +val-1 });

                }

                else{
                    console.log("some error occured");
                }
              
            }

        });

    }
    else if( main_color === 'rgb(0, 0, 255)'){
        
        console.log("everything Fine");
        
        $.ajax({
            url: "home_section/unique_post_interaction.php",
            type: "post",
            data: {
                'unique_post_vote_check_up_final': 1,
                'type': 'U',
                'post_id': post_id,
            },

            success: function(response){
                console.log(response);
                if(response.trim() == "save"){
                    down.css('color', 'white');
         up.css('color', 'red');
        num_likes.css('color', 'red');
        num_likes.html(function(i, val) { return +val+2 });
        post_in_main_upvote_but.css('color', 'red');
        post_in_main_like_num.css('color', 'red');
        post_in_main_downvote_but.css('color', 'white');
        post_in_main_like_num.html(function(i, val) { return +val+2 });
                }

                else{
                    console.log("some error occured");
                }
         
            }

        });
        
    

    }
    // console.log(up_color);


});


$('.unique_downvote').on('click', function(){
    console.log("downvoted");
    var down = $(this);
    var down_color = down.css('color');
    var num_likes = down.siblings('.num_likes');
    var up = down.siblings('.unique_upvote');
    var main_color = num_likes.css('color');
    var post_id = down.siblings('.post_data_id').html();
    // var post_in_main = document.getElementById(post_id);
    var post_in_main = $('#' + post_id);
    var post_in_main_downvote_but = post_in_main.find('.downvote');
    var post_in_main_upvote_but = post_in_main.find('.upvote');
    var post_in_main_like_num  = post_in_main.find('.num_likes');
    console.log(post_id);
    
    if(main_color === 'rgb(255, 255, 255)'){

       
        $.ajax({
            url: "home_section/unique_post_interaction.php",
            type: "post",
            data: {
                'unique_post_vote_check_down': 1,
                'type': 'D',
                'post_id': post_id,
            },

            success: function(response){
                console.log(response);
                if(response.trim() == "save"){
                    down.css('color', 'blue');
                    num_likes.css('color', 'blue');
                    num_likes.html(function(i, val) { return +val-1 });
                    post_in_main_downvote_but.css('color', 'blue');
                    post_in_main_like_num.css('color', 'blue');
                    post_in_main_like_num.html(function(i, val) { return +val-1 });

                }

                else{
                    console.log("some error occured");
                }
           
            }

        });


    }
    else if(main_color === 'rgb(0, 0, 255)'){
        
       
        $.ajax({
            url: "home_section/unique_post_interaction.php",
            type: "post",
            data: {
                'unique_post_vote_un_check_down': 1,
                'post_id': post_id,
            },

            success: function(response){
                console.log(response);
                if(response.trim() == "save"){
                    down.css('color', 'white');
                    num_likes.css('color', 'white');
                    num_likes.html(function(i, val) { return +val+1 });
                    post_in_main_downvote_but.css('color', 'white');
                    post_in_main_like_num.css('color', 'white');
                    post_in_main_like_num.html(function(i, val) { return +val+1 });

                }

                else{
                    console.log("some error occured");
                }
              
            }

        });

    }
    else if(main_color === 'rgb(255, 0, 0)'){
        
        $.ajax({
            url: "home_section/unique_post_interaction.php",
            type: "post",
            data: {
                'unique_post_vote_un_check_down_final': 1,
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
                    post_in_main_downvote_but.css('color', 'blue');
                    post_in_main_upvote_but.css('color','white');
                    post_in_main_like_num.css('color', 'blue');
                    post_in_main_like_num.html(function(i, val) { return +val-2 });

                }

                else{
                    console.log("some error occured");
                }
              
            }

        });

    }


});



    var comment_state = false;
    var comment_content="";

var placeholder_comment = "Enter your comment..."; //Change this to your placeholder text
$("#new_comment_editable").on('click', function() {
    if ($(this).text() == placeholder_comment) {
        $(this).text("");
    }});

    $("#new_comment_editable").on('blur', function() {

        if (!$(this).text().length) {
        $(this).text(placeholder_comment);
        comment_state = false;
       
    
    
    }
    else{
    comment_content = $(this).text();
    comment_state = true;

       console.log("comment_valid");

    }


});


$('#comment_post_button').on('click', function(){
    var comment_block =$(this);
    console.log('cehck1');
    var post_id = comment_block.children('.post_data_id').html();
    // console.log(post_id);
    var post_in_main = $('#' + post_id);
    // console.log('cehck1');
    var post_in_main_comment = post_in_main.find('.load_main_comment');
    var comment_sec = $("#num_comment");

    // console.log("hello there post clicked");
    // console.log(comment_state);


if (comment_state == false) {
    console.log("not valid");

}
else{
    console.log("valid");
    $.ajax({
        url: 'home_section/unique_post_comment.php',
        type: 'post',
        data: {
            'comment_save' : 1,
            'comment': comment_content,
        },

        success: function(response){
            // console.log(response);
            $( "#new_comment_editable" ).text(placeholder_comment);
            post_in_main_comment.html(function(i, val) { return +val+1 });
            comment_sec.html(function(i, val) { return +val+1 });
            comment_content="";
            comment_state = false;
            

            $(response).prependTo( "#old_post_comment" );






            // document.getElementById("new_comment_editable").text(placeholder_comment);
            
        }
    });
}
});





});

function go_back_from_post_page(){
    document.getElementById("pop_up_body").innerHTML = "";
    document.getElementById("pop_up_body").style.display="none";

}

