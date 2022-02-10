console.log("no error here");

$( document ).ready(function() {
    console.log("not loaded yet");
    $('#three_main_body').load('relation_section/friend_load_main.php');
    console.log("loaded");
        
});

function friend(){
    document.getElementsByClassName("active")[0].classList.remove("active");   
    document.getElementsByClassName("friends_friend")[0].classList.add("active");
    $('#three_main_body').load('relation_section/friend_load_main.php');
}

function group(){
    document.getElementsByClassName("active")[0].classList.remove("active");   
    document.getElementsByClassName("friends_group")[0].classList.add("active");
    console.log("group_clicked");
    $('#three_main_body').load('relation_section/group_load_main.php');

}


function following(){
    document.getElementsByClassName("active")[0].classList.remove("active");   
    document.getElementsByClassName("friends_following")[0].classList.add("active");
    $('#three_main_body').load('relation_section/following_load_main.php');


}

function follower(){
    document.getElementsByClassName("active")[0].classList.remove("active");   
    document.getElementsByClassName("friends_followers")[0].classList.add("active");
    $('#three_main_body').load('relation_section/follower_load_main.php');
}



