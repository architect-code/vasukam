<?php
session_start();
require_once "pdo.php";


if(isset($_COOKIE["success"]) && isset($_COOKIE["account"])){
    $_SESSION["success"] = $_COOKIE["success"];
    $_SESSION["account"] = $_COOKIE["account"];
}



if(isset($_SESSION["success"]) && isset($_SESSION["account"])){
    $user_main = (int)$_SESSION["account"];
 
    if ($_SESSION["success"]==="login" && $user_main!==0){
        header("Location: ../second_screen/second_screen.php");
        // header("Location: trial.php");
        return;
        // echo("<script>console.log('no error 2');</script>");
}}


else{
unset($_COOKIE['account']);
setcookie('account', '', 1, '/'); 
unset($_COOKIE['success']);
setcookie('success', '', 1, '/'); 
unset($_SESSION["success"]);
unset($_SESSION["account"]);
unset($_SESSION["email"]);
unset($_SESSION["username"]);
unset($_SESSION["password"]);
}
?>




<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/5e4ef34fb5.js" crossorigin="anonymous"></script>
        <link rel="icon" type="png/image" href="../random_image/vasukam.png">

        <link rel="stylesheet" href="first_screen.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            var url = "first_screen.js";
            $.getScript(url);
   
        </script>
        

    </head>


    <body>
      
        <section class="one_background">
        
        <section class="two_body" id="two_back">
            <img src="random_image/art1.jpg">
            <img src="random_image/art2.jpg">
            <img src="random_image/art3.jpg">
            <img src="random_image/art4.jpg">
            <img src="random_image/art5.jpg">
            <img src="random_image/art6.jpg">
            <img src="random_image/art7.jpg">
            <img src="random_image/art8.jpg">
            <img src="random_image/art9.jpg">
            <img src="random_image/art10.jpg">
            <img src="random_image/art11.jpg">
            <img src="random_image/art12.jpg">
            <img src="random_image/art13.jpg">
            <img src="random_image/art14.jpg">
            <img src="random_image/art15.jpg">
            <img src="random_image/art16.jpg">
            <img src="random_image/art17.jpg">
            <img src="random_image/art18.jpg">
            <img src="random_image/art19.jpg">
            <img src="random_image/art20.jpg">
            <img src="random_image/art21.jpg">
            
        </section>
    </section>
    <section class="two_main_body">
        <section class="one_top_bar">
            <div class="three_main_icon">
                <img src="../random_image/vasukam.png">
            </div>
            <div class="four_buttons">
                <span onclick="signup1()" class="signup" >Sign Up</span>
                <span onclick="login1()" class="login" >Log In</span>
                <span onclick="mainback()" class="back" >Back</span>
            </div>

        </section>
        

        <section class="three_action_field">
            <div class="four_app_name">
                #vasukam

            </div>
            <div id="action_part">

            </div>
                



            </section>
   
     
        

            </section>



    </body>

</html>