// console.log("search load successfully");
// // $( document ).ready(function() {
// //     // document.getElementById("five_search_section").focus();
// //     console.log("search load successfu");
// // });



// console.log("search load successfu");

// window.setTimeout(function ()
// {
//     document.getElementById("five_search_section").focus();
// }, 0);


function search_query(search1){
    var query = search1.value;
    
    if (!query.length){
        console.log("nothing there");
        document.getElementById('three_search_body').innerHTML = "";
        // document.getElementById("pop_up_body").innerHTML="";
        // document.getElementById("pop_up_body").style.display="none";

    }
    else{
        console.log(query);
        $.ajax({
            url: 'search/search_database.php',
            type: 'post',
            data: {
                'search_check' : 1,
                'search_query': query,
            },
            success: function(response){
                // console.log(response.trim());

                // post_in_main_comment.html(function(i, val) { return +val+1 });
                // comment_sec.html(function(i, val) { return +val+1 });
                // comment_content="";
                // comment_state = false;
                document.getElementById('three_search_body').innerHTML = "";
                $(response).prependTo('#three_search_body');

            }
    

});

}

}

function search_go_back(){
    console.log("goback");
        document.getElementById("pop_up_body").innerHTML="";
        document.getElementById("pop_up_body").style.display="none";
}

function other_user_profile(other_user){

    var other_user_id =  other_user.firstElementChild.innerHTML;
    // console.log(other_user_id);
    // alert("hrllo");
    $.ajax({
        url: "profile/other_profile_check.php",
        type: "post",
        data: {
            'other_profile_check': 1,
            'other_user_id': other_user_id,
        },

        success: function(response){
            console.log(response);
            if(response.trim() == "save"){
                location.href = "profile/other_user_profile_friend.php";

            }

            else{
                console.log("some error occured");
                alert("some error occured");
            }
     
        }

    });
    

}

function group_profile(group){

    var group_id =  group.firstElementChild.innerHTML;
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
    
    
}


    $('.five_user_box').on('click', function(){
        console.log("clciked");
        var friend =$(this);
        var user_id = friend.children('.friend_user_id').text();
        console.log(user_id);
        $.ajax({
            url: "profile/other_profile_check.php",
            type: "post",
            data: {
                'other_profile_check': 1,
                'other_user_id': user_id,
            },

            success: function(response){
                console.log(response);
                if(response.trim() == "save"){
                    location.href = "profile/other_user_profile_friend.php";

                }

                else{
                    console.log("some error occured");
                    alert("some error occured");
                }
         
            }

        });


    });


