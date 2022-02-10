<?php
session_start();
require_once "../pdo.php";

if(isset($_SESSION["success"]) && isset($_SESSION["account"])){

    $user_main = (int)$_SESSION["account"];
    unset($_SESSION["profile"]);
    $_SESSION["profile"] = (int)$_SESSION["account"];
 
    if ($_SESSION["success"] === "login" && $user_main!==0){
        $user_query = "SELECT 
        users.username as username, 
        users.user_join_time as join_time,
        users.num_friend as num_friend, 
        users.num_follower as num_follower, 
        users.num_following as num_following,
        users.image_url as image_url,
        users.name as main_name,
        users.dhan as dhan
        FROM users 
        WHERE users.user_id = :un";

         $stmt_user = $pdo->prepare($user_query);
         $stmt_user->execute(array(
            ":un"=>$user_main,
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
        <script src="my_profile.js" type="text/javascript" defer></script>

        
      
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
    $dhan = $result["dhan"];

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

         <div class='six_profile_action'>

         <div class='seven_edit_profile'>
             Edit Profile <i class='fas fa-lock' style = 'padding-left: 1.5vw'></i>
        </div>

        <div class='seven_wallet'>
        Wallet: $dhan <i class='fab fa-vuejs' style = 'padding-left: 1.5vw'></i>
        </div>

         </div>
        
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




