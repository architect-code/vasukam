<?php
session_start();
require_once "pdo.php";

if(isset($_SESSION["success"]) && isset($_SESSION["account"])){
    $user_main = (int)$_SESSION["account"];
 
    if ($_SESSION["success"]==="login" && $user_main!==0){

        $user_query = "SELECT
        us.image_url as image_url
        FROM 
        users us WHERE us.user_id = :ui";

        $stmt_user = $pdo->prepare($user_query);

        $stmt_user->execute(array(
        ":ui"=>$user_main,

        ));

        $result=$stmt_user->fetch(PDO::FETCH_ASSOC);

        if($result === FALSE){
            unset($_COOKIE['account']);
            setcookie('account', '', 1, '/'); 
            unset($_COOKIE['success']);
            setcookie('success', '', 1, '/'); 
            unset($_SESSION["success"]);
            unset($_SESSION["account"]);
            unset($_SESSION["email"]);
            unset($_SESSION["username"]);
            unset($_SESSION["password"]);
            session_destroy();
            header("Location: ../first_screen/first_screen.php");
            return;
            exit();
        }
        else{
            $image_url = $result["image_url"];

        }

    }

    else{
    
        header("Location: ../first_screen/first_screen.php");
        return;
        exit();

    }
}

    else{

        header("Location: ../first_screen/first_screen.php");
        return;
        exit();

    }


?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/5e4ef34fb5.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="second_screen.css">
        <link rel="icon" type="png/image" href="../random_image/vasukam.png">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="second_screen.js" type="text/javascript" defer></script>
        <!-- <script src="search/search.js" type="text/javascript" defer></script> -->

        <!-- <script>
             var url = "second_screen.js";
             $.getScript(url);
        </script>   -->
    </head>

    <body>
        <section class="pop_up_body" id="pop_up_body">
        </section>

        <section class="pop_up_marketplace" id="pop_up_marketplace">
        
        </section>

        <section class="main_cover" id="main_cover">
        <section class="one_top_bar">
            <div class="five_profile" onclick="profile()">
            <?php
            echo("
            <div id = 'main_user_id' class='main_user_id' style = 'display:none'>$user_main</div>
            <img src= $image_url>
            ");
            ?>

            </div>
            <div class="six_search" >
                <div id="seven_search_query" onclick = search()>
                    Search...
                                       
</div>

            </div>
            <div class="six_heading">
                Chats

            </div>

            <div class="seven_settings" onclick="setting()">
                <i class="fas fa-cog"></i>

            </div>

        </section>

        <section class="one_one_changable_body" id="main_body">

    </section>
        <section class="four_bottom_bar" style = 'position: fixed; bottom:0'>
            <div onclick="home()"><i class="fas fa-home active_bottom" ></i></div>
            <div onclick='relation()'><i class="fas fa-users friends"></i></div>
            <div onclick="new_post()"><i class="fas fa-plus-circle" ></i></div>
            <div onclick="messages()"><i class="fas fa-comment-alt messages" ></i></div>
            <div onclick="notification()"><i class="fas fa-bell" ></i></div>
        </section>
    </section>

    </body>


</html>