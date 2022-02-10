$('#seven_scroll_body').load('group_post.php', function() {
    console.log("done");
 
});
console.log("hello");

window.onscroll = function() {scrollFunction()};
var vw = (document.documentElement.clientWidth)/100;

function scrollFunction() {
    if (window.scrollY > 50*vw) {
  
    //   document.getElementById("six_profile").style.display = "flex";
      document.getElementById("two_top_nav_bar").style.backgroundColor = "#000000";
      document.getElementById("six_nav_bar").style.position = "fixed";
      document.getElementById("six_nav_bar").style.top = 10*vw;
      document.getElementById("six_nav_bar").style.backgroundColor = "#000000";
      
  
    }
  
  
     else {
    //   document.getElementById("six_profile").style.display = "none";
      document.getElementById("two_top_nav_bar").style.backgroundColor = "transparent";
      document.getElementById("six_nav_bar").style.position = "static";
      document.getElementById("six_nav_bar").style.backgroundColor = "transparent";
      // document.getElementById("three_top_tab").style.top = 10*vw;
    }
  }

function post(){
  console.log("post clicked");
    document.getElementsByClassName("active")[0].classList.remove("active");   
    document.getElementsByClassName("post")[0].classList.add("active");
    $('#seven_scroll_body').load('group_post.php');

}


function about(){
  console.log("about clicked");
    document.getElementsByClassName("active")[0].classList.remove("active");   
    document.getElementsByClassName("about")[0].classList.add("active");
    $('#seven_scroll_body').load('group_about.php');
}

function grp_go_back(){
  location.href = "../second_screen.php";
}

function join_group(grp){
  var group_id_parent = grp.parentNode;
  var group_id =  group_id_parent.lastElementChild.innerHTML;
  // console.log(group_id);
  $.ajax({
    url: 'join_remove_group.php',
    type: 'post',
    data: {
        'join_group' : 1,
        'group_id': group_id,
    },

    success: function(response){
        console.log(response);
        if(response.trim() == "save"){
        location.href = "other_user_profile_group.php";
      }

      else{
        alert("some error occured");
        location.href = "../second_screen.php";

      }
     }

});
}

function remove_from_group(grp){
  var group_id_parent = grp.parentNode;
  var group_id =  group_id_parent.lastElementChild.innerHTML;
  // console.log(group_id);
  $.ajax({
    url: 'join_remove_group.php',
    type: 'post',
    data: {
        'remove_group' : 1,
        'group_id': group_id,
    },

    success: function(response){
        console.log(response);
        if(response.trim() == "save"){
        location.href = "other_user_profile_group.php";
      }

      else{
        alert("some error occured");
        location.href = "../second_screen.php";

      }
     }

});
}