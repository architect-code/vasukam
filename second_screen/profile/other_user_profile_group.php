<?php
session_start();
require_once "../pdo.php";

if(isset($_SESSION["success"]) && isset($_SESSION["account"])){

    $group_main = (int)$_SESSION["group_id"];
    $user_main = $_SESSION["account"];

    if ($_SESSION["success"] === "login" && $group_main!==0){
        $group_query = "SELECT 
        gp.grp_id as grp_id,
        gp.grpname as grpname,
        gp.grp_create_time as grp_create_time,
        gp.image_url as image_url,
        gp.members as num_mem,
        gp.grp_des as descript,
        gur.relation as relation
        FROM
        grps gp JOIN users us LEFT JOIN grp_user_rel gur ON gp.grp_id = gur.grp_id AND us.user_id = gur.user_id
        WHERE gp.grp_id = :gi AND us.user_id = :ui;";

         $stmt_group = $pdo->prepare($group_query);
         $stmt_group->execute(array(
            ":gi"=>$group_main,
            ":ui"=>$user_main,
        ));

        $result=$stmt_group->fetch(PDO::FETCH_ASSOC);
        if($result === FALSE){
            header("Location: ../second_screen.php");
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
        <link rel="stylesheet" href="groups.css">
        <link rel="icon" type="png/image" href="../random_image/vasukam.png">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="groups.js" type="text/javascript" defer></script>

        
      
    </head>

    <body>


    <?php 
    $grpname = htmlentities($result["grpname"]);
    $grp_create_time = $result["grp_create_time"];
    $num_mem = $result["num_mem"];
    $image_url = "../".$result["image_url"];
    $relation = $result["relation"];
    $descript = htmlentities($result["descript"]);

    

 echo("
 
<section class='one_main'>
    <section class='two_top_nav_bar' id='two_top_nav_bar'>
        <div class='three_go_back' onclick = 'grp_go_back()'><i class='fas fa-arrow-left'></i></div>

<div class='five_share'><i class='fas fa-share-alt'></i></div>
</section>
<section class='two_meta'>
<section class='four_pics'>
    <div class='eight_cover'>
</div>
<div class='nine_group_pic'>
    <img src=$image_url>
</div>
</section>
<section class='five_data'>
<div class = 'ten_group_name_button'>
    <div class='ten_group_name'>
    $grpname
</div>

");

if($relation == "F"){
    echo("
    <div class = 'ten_join_que'>

    <span style = 'background-color: black; color: var(--blue3);' onclick = 'remove_from_group(this)'> Joined   </span>
    <span style = 'display: none'>$group_main</span>

</div>

    
    ");
}

elseif(is_null($relation)){
    echo("
    <div class = 'ten_join_que'>

    <span  onclick = 'join_group(this)'>Join</span>
    <span style = 'display: none'>$group_main</span>

</div>

    
    ");

}





echo("
</div>
<div class='twelve_population'>
$num_mem members
</div>
<div class='eleven_description'>
$descript
</div>
</section>
</section>

");

?>

<section class='three_body'>

<section class='six_nav_bar' id='six_nav_bar'>
    <div class='twelve_tabs active post' onclick = 'post()'>Post</div>
    <div class='twelve_tabs about' onclick = 'about()'>About</div>
</section>

<section class='seven_scroll_body' id='seven_scroll_body'>

    
</section>
</section>






</section>






</body>
</html>








