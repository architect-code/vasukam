console.log("no error here");

$( document ).ready(function() {
    console.log("not loaded yet");
    $('#three_main_body').load('notification_section/notification_load_main.php');
    console.log("loaded");
        
});

function notification_tab(){
    document.getElementsByClassName("active")[0].classList.remove("active");   
    document.getElementsByClassName("notification_tab")[0].classList.add("active");
    $('#three_main_body').load('notification_section/notification_load_main.php');
}

function inbox(){
    document.getElementsByClassName("active")[0].classList.remove("active");   
    document.getElementsByClassName("inbox")[0].classList.add("active");
    
    $('#three_main_body').load('notification_section/inbox_load_main.php');

}







