

<?php
session_start();
require_once "../pdo.php";

if(isset($_SESSION["success"]) && isset($_SESSION["account"])){
    $user_main = (int)$_SESSION["account"];

    $other_user_main = (int)$_SESSION["other_user_id"];

    if($user_main == $other_user_main){
        header("Location: my_profile.php");
        return;

        exit();

    }
 
    if ($_SESSION["success"] === "login" && $other_user_main!==0){
        $user_query = "SELECT 
        us2.username as username, 
        us2.user_join_time as join_time,
        us2.num_friend as num_friend, 
        us2.num_follower as num_follower, 
        us2.num_following as num_following,
        us2.image_url as image_url,
        us2.name as main_name,
        uur.relation as relation
        FROM users us1 JOIN users us2
        LEFT JOIN user_user_rel uur ON us1.user_id = uur.user1_id AND uur.user2_id = us2.user_id
        WHERE us1.user_id = :ui1 AND us2.user_id = :ui2";

         $stmt_user = $pdo->prepare($user_query);
         $stmt_user->execute(array(
            ":ui1"=>$user_main,
            ":ui2"=>$other_user_main,
          
        ));

        $result=$stmt_user->fetch(PDO::FETCH_ASSOC);
        if($result === FALSE){
            header("Location: ../../first_screen/first_screen.php");
            return;

            exit();
        }
        
    }


    else{

      
        header("Location: ../../first_screen/first_screen.php");
            return;

            exit();

    }

}

    else{
        // go to first screen
        // echo("<script>console.log('checl3');</script>");
        header("Location: ../../first_screen/first_screen.php");
            return;

            exit();

    }


?>





<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/5e4ef34fb5.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="myprofile.css">
        <link rel="icon" type="png/image" href="../random_image/vasukam.png">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="other_profile.js" type="text/javascript" defer></script>
        <script src="user_user_connect.js" type="text/javascript" defer></script>

        
      
    </head>

    <body>


    <?php 
    $username = htmlentities($result["username"]);
    $join_time = $result["join_time"];
    $num_friend = $result["num_friend"];
    $num_follower = $result["num_follower"];
    $num_following = $result["num_following"];
    $imageurl = "../".$result["image_url"];
    $name = $result["main_name"];
    $relation = $result["relation"];

    echo("
    <section class='one_top_profile'>

    <section class='zero_navbar_two' id='zero_navbar_two'>
    <div class='three_back_plus_profile'>
    <div class='five_back' onclick = 'go_back()'>
    <i class='fas fa-arrow-left'></i>
          
</div>
<div class='six_profile' id='six_profile'>
@$username
</div>
</div>
<div class='four_share_profile'>
<i class='fas fa-share-alt'></i>
</div>
</section>

        <section class='two_cover'>
            

        </section>
        <section class='three_profile_pic'>
            <img src=$imageurl>

        </section>

    </section>
    <section class='two_top_desc'>
        <div class='three_name'>
            $name

        </div>
        <div class='four_username'>
            $username <span class='dot'></span>  $join_time

        </div>
        <div class='five_follow'>
            $num_follower followers <span class='dot'></span> $num_following following <span class='dot'></span> $num_friend friends
         </div>

         ");


         if($relation == "F"){
             echo("
             <div class='six_profile_action'>
             <div class='seven_friend six_profile_action_button' onclick = 'remove_friend()'>
                  Friend <i class='fas fa-check' style = 'padding-left:1.5vw'></i>
             </div>
             <div class='seven_following six_profile_action_button'>
                  Following <i class='fas fa-check' style = 'padding-left:1.5vw'></i>
             </div>

          
     
              </div>
             
             ");

         }

         elseif($relation == "A"){
            echo("
            <div class='six_profile_action'>
            <div class='seven_send_friend_request six_profile_action_button' onclick = 'send_friend_request()'>
                 Connect
            </div>
            <div class='seven_following six_profile_action_button' onclick = 'stop_following()'>
                 Following <i class='fas fa-check' style = 'padding-left: 1.5vw'></i>
            </div>
            
         
    
             </div>
            
            ");

         }

        //  elseif($relation == "B"){
        //     echo("
        //     <div class='six_profile_action'>
        //     <div class='seven_follower six_profile_action_button'>
        //          Follower
        //     </div>
        //     <div class='seven_send_friend_request six_profile_action_button'>
        //     Send friend Request
        //     </div>   
         
    
        //      </div>
            
        //     ");

        //  }

         elseif($relation == "C"){
            echo("
            
         
    <div class='six_profile_action'>
    <div class='six_profile_action'>
    <div class='seven_friend_request_sent six_profile_action_button' onclick = 'remove_friend_request()'>
    Request Sent
    </div>  
    <div class='seven_following six_profile_action_button' onclick = 'stop_following_send_connect_request()'>
         Following <i class='fas fa-check' style = 'padding-left:1.5vw'></i>
    </div>
   
 

     </div>
            
            ");

         }

         elseif($relation == "E"){
            echo("
            
         
    <div class='six_profile_action'>
    <div class='six_profile_action'>
    <div class='seven_friend_request_sent six_profile_action_button' onclick = 'remove_friend_request()'>
    Request Sent
    </div>  
    <div class='seven_follow six_profile_action_button' onclick = 'send_friend_request()'>
         Follow 
    </div>
   
 

     </div>
            
            ");

         }

         elseif($relation == "D"){
            echo("
            
         
    <div class='six_profile_action'>
    <div class='six_profile_action'>
    <div class='seven_friend_request_received six_profile_action_button' onclick = 'accept_friend_request_from_D()'>
    Accept Friend Request
    </div>  
    <div class='seven_follow six_profile_action_button' onclick = 'accept_friend_request_from_D()'>
         Follow 
    </div>
   
 

     </div>
            
            ");

         }

         elseif($relation == "G"){
            echo("
            
         
    <div class='six_profile_action'>
    <div class='six_profile_action'>
    <div class='seven_friend_request_received six_profile_action_button' onclick = 'accept_friend_request_from_G()'>
    Accept Friend Request
    </div>  
    <div class='seven_follow six_profile_action_button' onclick = 'accept_friend_request_from_G()'>
         Follow 
    </div>
   
 

     </div>
            
            ");

         }


        elseif(is_null($relation)){
            echo("
                 
    <div class='six_profile_action'>
    <div class='six_profile_action'>
    <div class='seven_send_friend_request six_profile_action_button' onclick = 'send_friend_request()'>
    Connect
    </div> 
    <div class='seven_follow six_profile_action_button' onclick = 'follow_request()'>
    Follow
    </div>
      
 

     </div>
            
            ");
             
        }

        elseif($relation == "B"){
            echo("
                 
    <div class='six_profile_action'>
    <div class='six_profile_action'>
    <div class='seven_send_friend_request six_profile_action_button' onclick = 'make_friends()'>
    Connect
    </div> 
    <div class='seven_follow six_profile_action_button' onclick = 'make_friends()'>
    Follow 
    </div>
      
 

     </div>
            
            ");
             
        }

      

         echo("
        
    </section>
    
    
    
    
    
    ");
    
    
    
    ?>
      
     




        <section class="three_top_tab" id="three_top_tab">
            <div class="eight_tabs active eight_post" onclick="post()">
                Posts
            </div>
            <div class="eight_tabs eight_comment" onclick="comment()">
                Comments
            </div>
            <div class="eight_tabs eight_about" onclick="about()">
                About
            </div>
            
        </section >

        <section class="four_body" id="four_body">




           
        </section>
            
    </body>
    </html>




