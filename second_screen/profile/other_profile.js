console.log("hello");
window.onscroll = function() {scrollFunction()};

var vw = (document.documentElement.clientWidth)/100;
// if (document.body.scrollTop > 70*vw || document.documentElement.scrollTop > 70*vw)

    $('#four_body').load('profile_post.php', function() {
        console.log("done");
        // This gets executed when the content is loaded
    // document.getElementsByClassName("three_main_body")[0].style.marginTop = "0vw";
    // document.getElementsByClassName("three_main_body")[0].style.height = "calc(100vh - calc(30vw + 1px))";
    // document.getElementsByClassName("six_search")[0].style.display="flex";
    // document.getElementsByClassName("six_heading")[0].style.display="none";
    });

function scrollFunction() {
  if (window.scrollY > 60*vw) {

    document.getElementById("six_profile").style.display = "flex";
    document.getElementById("zero_navbar_two").style.backgroundColor = "#000000";
    document.getElementById("three_top_tab").style.position = "fixed";
    document.getElementById("three_top_tab").style.top = 10*vw;
    document.getElementById("three_top_tab").style.backgroundColor = "#000000";
    

  }


   else {
    document.getElementById("six_profile").style.display = "none";
    document.getElementById("zero_navbar_two").style.backgroundColor = "transparent";
    document.getElementById("three_top_tab").style.position = "static";
    document.getElementById("three_top_tab").style.backgroundColor = "transparent";
    // document.getElementById("three_top_tab").style.top = 10*vw;
  }
}

function post(){
    document.getElementsByClassName("active")[0].classList.remove("active");   
    document.getElementsByClassName("eight_post")[0].classList.add("active");
    $('#four_body').load('profile_post.php');

}

function comment(){
    document.getElementsByClassName("active")[0].classList.remove("active");   
    document.getElementsByClassName("eight_comment")[0].classList.add("active");
    $('#four_body').load('profile_comment.php');
}

function about(){
    document.getElementsByClassName("active")[0].classList.remove("active");   
    document.getElementsByClassName("eight_about")[0].classList.add("active");
    $('#four_body').load('profile_about.php');
}


function go_back(){
    console.log("goback");
    location.href = "../second_screen.php";
}