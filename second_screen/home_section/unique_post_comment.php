<?php 
session_start();
require_once "../pdo.php";
$post_id = $_SESSION["post_id"];
$user_main = $_SESSION["account"];


if(isset($_POST['comment_save'])){
    $comment_content = $_POST["comment"];

$save_comment = "INSERT INTO post_comment (post_id, user_id, content) VALUES (:pi, :ui, :co);
        UPDATE post_data SET num_comment = num_comment + 1 WHERE post_id = :pi; 
        UPDATE users SET num_comment = num_comment + 1 WHERE user_id = :ui;       
        ";
    $stmt1 = $pdo->prepare($save_comment);
    $stmt1->execute(array(
        ":pi"=>$post_id,
        ":ui"=>$user_main,
        ":co"=>$comment_content,
        
    ));
    $stmt1->closeCursor();

    $get_data = "SELECT users.username as username,
    users.image_url as imageurl 
    FROM users 
    WHERE users.user_id = :uid;";

$stmt2 = $pdo->prepare($get_data);
$stmt2->execute(array(
    ":uid"=>$user_main,    
));

    $result=$stmt2->fetch(PDO::FETCH_ASSOC);
    if($result===FALSE){
        echo("error");
        exit();
    }
    else{
    $username = $result["username"];
    $imageurl = $result["imageurl"];
}

    echo ("
    <div class='post_comment'> 
            <div class='comment_meta'> 
            <img src=$imageurl> 
            <div> 
            <span class='comment_username'>$username</span> 
            <span class='comment_when'>Just Now</span> 
            </div> 
            </div> 
            <div class='comment_data'> 
            <span>$comment_content</span> 
            </div> 
        </div>
    ");
    exit();




}

?>