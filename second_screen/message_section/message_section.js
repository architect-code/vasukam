console.log("no error here");

$( document ).ready(function() {
    console.log("not loaded yet");
    $('#three_main_body').load('message_section/chat_load_main.php');
    console.log("loaded");
        
});

function chat(){
    document.getElementsByClassName("active")[0].classList.remove("active");   
    document.getElementsByClassName("chat")[0].classList.add("active");
    $('#three_main_body').load('message_section/chat_load_main.php');
}

function chat_request(){
    document.getElementsByClassName("active")[0].classList.remove("active");   
    document.getElementsByClassName("chat_request")[0].classList.add("active");
    
    $('#three_main_body').load('message_section/chat_request_load_main.php');

}






