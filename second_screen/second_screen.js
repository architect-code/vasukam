$( document ).ready(function() {
    document.getElementById("pop_up_body").innerHTML="";
    document.getElementById("pop_up_body").style.display="none";
    document.getElementsByClassName("active_bottom")[0].classList.remove("active_bottom");   
    document.getElementsByClassName("fa-home")[0].classList.add("active_bottom");
    $('#main_body').load('home_section/home_section.php', function() {
        // This gets executed when the content is loaded
    // document.getElementsByClassName("three_main_body")[0].style.paddingTop = "0vw";
    // document.getElementsByClassName("three_main_body")[0].style.height = "calc(100vh - calc(35vw + 1px))";
    document.getElementsByClassName("six_search")[0].style.display="flex";
    document.getElementsByClassName("six_heading")[0].style.display="none";
    });
});

function home(){
    document.getElementsByClassName("active_bottom")[0].classList.remove("active_bottom");   
    document.getElementsByClassName("fa-home")[0].classList.add("active_bottom");
    $('#main_body').load('home_section/home_section.php', function() {
        // This gets executed when the content is loaded
    // document.getElementsByClassName("three_main_body")[0].style.paddingTop = "0vw";
    
    document.getElementsByClassName("six_search")[0].style.display="flex";
    document.getElementsByClassName("six_heading")[0].style.display="none";
    });
}



function relation(){
    document.getElementsByClassName("active_bottom")[0].classList.remove("active_bottom");   
    document.getElementsByClassName("friends")[0].classList.add("active_bottom");

    $('#main_body').load('relation_section/relation_section.php', function() {
        // This gets executed when the content is loaded
        // document.getElementsByClassName("three_main_body")[0].style.paddingTop = "2vw";
        document.getElementsByClassName("three_main_body")[0].style.overflow = "scroll";
    // document.getElementsByClassName("three_main_body")[0].style.height = "calc(100vh - calc(35vw + 1px))";
    document.getElementsByClassName("six_search")[0].style.display="flex";
    document.getElementsByClassName("six_heading")[0].style.display="none";
    });

    
}
    
function new_post(){
    $('#pop_up_body').load('new_post_section/new_post_pop.php', function(){
    console.log("done");
    document.getElementsByClassName("pop_up_body")[0].style.display = "block"; 

    });
    // console.log("no error");

}

window.onclick = function(event) {

    if (event.target == document.getElementsByClassName("pop_up_body")[0]) {
        document.getElementsByClassName("pop_up_body")[0].style.display = "none";
    }

  
  }



function profile(){
    location.href = "profile/my_profile.php";
    // console.log("profile clicked");
}


function setting(){
    location.href = "setting/setting.php";
}

function search(){
    console.log("search clicked");
    document.getElementById("pop_up_body").innerHTML="";
   

    $('#pop_up_body').load('search/search.php', function(){
        document.getElementById("pop_up_body").style.display="flex";

    });
        

}


function close_pop_up(){
    document.getElementsByClassName("pop_up_body")[0].style.display = "none";
}

function messages(){
    document.getElementsByClassName("active_bottom")[0].classList.remove("active_bottom");   
    document.getElementsByClassName("messages")[0].classList.add("active_bottom");
    $('#main_body').load('message_section/message_section.php', function() {
        // This gets executed when the content is loaded
        // document.getElementsByClassName("three_main_body")[0].style.paddingTop = "2vw";
        document.getElementsByClassName("three_main_body")[0].style.overflow = "scroll";
    // document.getElementsByClassName("three_main_body")[0].style.height = "calc(100vh - calc(35vw + 1px))";
    document.getElementsByClassName("six_search")[0].style.display="none";
    document.getElementsByClassName("six_heading")[0].innerHTML="Chats";
    document.getElementsByClassName("six_heading")[0].style.display="flex";
    });
}

function notification(){
    document.getElementsByClassName("active_bottom")[0].classList.remove("active_bottom");   
    document.getElementsByClassName("fa-bell")[0].classList.add("active_bottom");
    $('#main_body').load('notification_section/notification_section.php', function() {
        // This gets executed when the content is loaded
        // document.getElementsByClassName("three_main_body")[0].style.paddingTop = "2vw";
    document.getElementsByClassName("three_main_body")[0].style.overflow = "scroll";
    // document.getElementsByClassName("three_main_body")[0].style.height = "calc(100vh - calc(35vw + 1px))";
    document.getElementsByClassName("six_search")[0].style.display="none";
    document.getElementsByClassName("six_heading")[0].innerHTML="Notification";
    document.getElementsByClassName("six_heading")[0].style.display="flex";
        
});
}

