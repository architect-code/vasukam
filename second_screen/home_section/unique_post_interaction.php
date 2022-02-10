<?php
session_start();
require_once "../pdo.php";

$user_main = $_SESSION["account"];
$post_id = $_SESSION["post_id"];

if(isset($_POST["unique_post_vote_check_up"])){
   

    $post_upvote = "DELETE FROM post_vote WHERE (user_id = :ui AND post_id = :pi );
    INSERT INTO post_vote (post_id, user_id,  vote) VALUES (:pi, :ui, :ve);
    UPDATE post_data SET num_likes = num_likes + 1 WHERE post_id = :pi;";

    $stmt1 = $pdo->prepare($post_upvote);
        $stmt1->execute(array(
            ":pi"=>$post_id,
            ":ui"=>$user_main,
            ":ve"=>$_POST["type"],
            
        ));
        echo("save");
        

    exit();


}


if(isset($_POST["unique_post_vote_check_up_final"])){
    

    $post_upvote = "DELETE FROM post_vote WHERE (user_id = :ui AND post_id = :pi );
    INSERT INTO post_vote (post_id, user_id,  vote) VALUES (:pi, :ui, :ve);
    UPDATE post_data SET num_likes = num_likes + 2 WHERE post_id = :pi;";

    $stmt1 = $pdo->prepare($post_upvote);
        $stmt1->execute(array(
            ":pi"=>$post_id,
            ":ui"=>$user_main,
            ":ve"=>$_POST["type"],
            
        ));
        echo("save");
        

    exit();


}


if(isset($_POST["unique_post_vote_un_check_up"])){

    $post_upvote = "DELETE FROM post_vote WHERE (user_id = :ui AND post_id = :pi );
    UPDATE post_data SET num_likes = num_likes - 1 WHERE post_id = :pi;";

    $stmt1 = $pdo->prepare($post_upvote);
        $stmt1->execute(array(
            ":pi"=>$post_id,
            ":ui"=>$user_main,
            
        ));
        echo("save");

    exit();


}


if(isset($_POST["unique_post_vote_check_down"])){

    $post_downvote = "DELETE FROM post_vote WHERE (user_id = :ui AND post_id = :pi );
    INSERT INTO post_vote (post_id, user_id, vote) VALUES (:pi, :ui, :ve);
    UPDATE post_data SET num_likes = num_likes - 1 WHERE post_id = :pi;";

    $stmt1 = $pdo->prepare($post_downvote);
        $stmt1->execute(array(
            ":pi"=>$post_id,
            ":ui"=>$user_main,
            ":ve"=>$_POST["type"],
            
        ));
echo("save");

    exit();


}


if(isset($_POST["unique_post_vote_un_check_down_final"])){

    $post_downvote = "DELETE FROM post_vote WHERE (user_id = :ui AND post_id = :pi );
    INSERT INTO post_vote (post_id, user_id, vote) VALUES (:pi, :ui, :ve);
    UPDATE post_data SET num_likes = num_likes - 2 WHERE post_id = :pi;";

    $stmt1 = $pdo->prepare($post_downvote);
        $stmt1->execute(array(
            ":pi"=>$post_id,
            ":ui"=>$user_main,
            ":ve"=>$_POST["type"],
            
        ));
echo("save");

    exit();


}

if(isset($_POST["unique_post_vote_un_check_down"])){

    $post_downvote = "DELETE FROM post_vote WHERE (user_id = :ui AND post_id = :pi );
    UPDATE post_data SET num_likes = num_likes + 1 WHERE post_id = :pi;";

    $stmt1 = $pdo->prepare($post_downvote);
        $stmt1->execute(array(
            ":pi"=>$post_id,
            ":ui"=>$user_main,
            
        ));
echo("save");
    exit();


}








?>