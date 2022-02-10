$( document ).ready(function() {

    $('#three_main_body').load('home_section/people_group.php')
        // This gets executed when the content is loaded

});


function main(){
    document.getElementsByClassName("active")[0].classList.remove("active");   
    document.getElementsByClassName("main")[0].classList.add("active");
    $('#three_main_body').load('home_section/people_group.php')
}

function favourite(){
    document.getElementsByClassName("active")[0].classList.remove("active");   
    document.getElementsByClassName("favourite")[0].classList.add("active");
    $('#three_main_body').load('home_section/load_post_favourite.php')
}

function interest(){
    document.getElementsByClassName("active")[0].classList.remove("active");   
    document.getElementsByClassName("interest")[0].classList.add("active");
    $('#three_main_body').load('home_section/load_post_interest.php')
}

function trending(){
    document.getElementsByClassName("active")[0].classList.remove("active");   
    document.getElementsByClassName("trending")[0].classList.add("active");
    $('#three_main_body').load('home_section/load_post_trending.php')
}



