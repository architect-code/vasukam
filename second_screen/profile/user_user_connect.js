function send_friend_request(){
    $.ajax({
        url: 'user_user_connect.php',
        type: 'post',
        data: {
            'send_friend_request' : 1,
        },
    
        success: function(response){
            console.log(response);
            if(response.trim() == "save"){
            location.href = "other_user_profile_friend.php";
          }
    
          else{
            alert("some error occured");
            location.href = "../second_screen.php";
    
          }
         }
    
    });
}

function follow_request(){
    $.ajax({
        url: 'user_user_connect.php',
        type: 'post',
        data: {
            'follow_request' : 1,
        },
    
        success: function(response){
            console.log(response);
            if(response.trim() == "save"){
            location.href = "other_user_profile_friend.php";
          }
    
          else{
            alert("some error occured");
            location.href = "../second_screen.php";
    
          }
         }
    
    });

}

function remove_friend(){
    $.ajax({
        url: 'user_user_connect.php',
        type: 'post',
        data: {
            'remove_friend' : 1,
        },
    
        success: function(response){
            console.log(response);
            if(response.trim() == "save"){
            location.href = "other_user_profile_friend.php";
          }
    
          else{
            alert("some error occured");
            location.href = "../second_screen.php";
    
          }
         }
    
    });

}


function stop_following(){
    $.ajax({
        url: 'user_user_connect.php',
        type: 'post',
        data: {
            'stop_following' : 1,
        },
    
        success: function(response){
            console.log(response);
            if(response.trim() == "save"){
            location.href = "other_user_profile_friend.php";
          }
    
          else{
            alert("some error occured");
            location.href = "../second_screen.php";
    
          }
         }
    
    });

}

function remove_friend_request(){
    $.ajax({
        url: 'user_user_connect.php',
        type: 'post',
        data: {
            'remove_friend_request' : 1,
        },
    
        success: function(response){
            console.log(response);
            if(response.trim() == "save"){
            location.href = "other_user_profile_friend.php";
          }
    
          else{
            alert("some error occured");
            location.href = "../second_screen.php";
    
          }
         }
    
    });

}

function accept_friend_request_from_D(){
    $.ajax({
        url: 'user_user_connect.php',
        type: 'post',
        data: {
            'accept_friend_request_from_D' : 1,
        },
    
        success: function(response){
            console.log(response);
            if(response.trim() == "save"){
            location.href = "other_user_profile_friend.php";
          }
    
          else{
            alert("some error occured");
            location.href = "../second_screen.php";
    
          }
         }
    
    });

}

function accept_friend_request_from_G(){
  $.ajax({
      url: 'user_user_connect.php',
      type: 'post',
      data: {
          'accept_friend_request_from_G' : 1,
      },
  
      success: function(response){
          console.log(response);
          if(response.trim() == "save"){
          location.href = "other_user_profile_friend.php";
        }
  
        else{
          alert("some error occured");
          location.href = "../second_screen.php";
  
        }
       }
  
  });

}

function stop_following_send_connect_request(){
  $.ajax({
    url: 'user_user_connect.php',
    type: 'post',
    data: {
        'stop_following_send_connect_request' : 1,
    },

    success: function(response){
        console.log(response);
        if(response.trim() == "save"){
        location.href = "other_user_profile_friend.php";
      }

      else{
        alert("some error occured");
        location.href = "../second_screen.php";

      }
     }

});

}

function make_friends(){
  $.ajax({
    url: 'user_user_connect.php',
    type: 'post',
    data: {
        'make_friends' : 1,
    },

    success: function(response){
        console.log(response);
        if(response.trim() == "save"){
        location.href = "other_user_profile_friend.php";
      }

      else{
        alert("some error occured");
        location.href = "../second_screen.php";

      }
     }

});

}