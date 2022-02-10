$( document ).ready(function() {
    var group_people_que = $("#group_people_que").html();
    if(group_people_que == "PEOPLE"){
        $('#five_post_section').load('home_section/load_post_main_people.php');
    }
    else if(group_people_que == "GROUP"){
        $('#five_post_section').load('home_section/load_post_main_group.php');
    }

});

function people_group_clicked(){
    // console.log("clicked");
    var group_people_que = $("#group_people_que");
    var group_people_que_icon = $("#group_people_que_icon");
    // console.log(group_people_que.html());

    if(group_people_que.html() == "PEOPLE"){
        // console.log("people");
        group_people_que.html("GROUP");
        group_people_que_icon.removeClass("fa-user-friends");
        group_people_que_icon.addClass("fa-users");


        $('#five_post_section').load('home_section/load_post_main_group.php');
    }
    else if(group_people_que.html() == "GROUP"){
        // console.log("group");
        group_people_que.html("PEOPLE");
        group_people_que_icon.removeClass("fa-users");
        group_people_que_icon.addClass("fa-user-friends");
        $('#five_post_section').load('home_section/load_post_main_people.php');
    }

}



