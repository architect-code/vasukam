<script src="relation_section/relation_friend.js" type="text/javascript" defer></script>
<?php
session_start();
require_once "../pdo.php";

$user_main = $_SESSION["account"];

// echo($home_main);
// echo($_SESSION["home_main"]);
// $home_main = "people";
// echo("<script>console.log('checl1');</script>");



    $post_query = "SELECT
    us2.username as username,
    uur.relation_time as rel_time,
    us2.name as fri_name,
    us2.image_url as imageurl,
    us2.user_id as fri_user_id
    FROM users us1 JOIN user_user_rel uur ON us1.user_id = uur.user1_id 
    JOIN users us2 ON us2.user_id = uur.user2_id
    WHERE (us1.user_id = :um) AND (uur.relation = 'B' OR uur.relation = 'D')
    ORDER BY uur.relation_time DESC";

$stmt_people = $pdo->prepare($post_query);

$stmt_people->execute(array(
    ":um"=>$user_main,
    // ":ff"=>"F",
    // ":ss"=>"S",
));


$result=$stmt_people->fetchAll(PDO::FETCH_ASSOC);
if(count($result) == 0){
    echo("
    <section style='width: 100vw; height 30vw; display: flex;
    align-items: center; justify-content: center; margin-top: 2vw'>
    <div style='width: 92vw; border-radius: 2vw; background-color: #1e1e1e; color: white;
    display: flex; align-items: center; justify-content: center; padding: 2vw; font-size: 4vw;'>
    Greetings from Vasukam, make new content to impress someone to follow you
    </div>
    
    </section>
      
      ");

      exit();


}

else{
    foreach($result as $row) {
        // echo("<script>console.log('checl1');</script>");
        $fri_name = $row["fri_name"];
        $imageurl = $row["imageurl"];
        $rel_time = $row["rel_time"];
        $fri_user_id = $row["fri_user_id"];

        echo("
        
        <div class='five_info_section load_friend_profile'>
        <div class='friend_user_id' style = 'display:none'>$fri_user_id</div>
            <div class='five_pic_section'>
                <img src=$imageurl>
            </div>
            <div class='six_meta'>
                <div class='seven_head_date'>
                    <div class='eight_head'>
                       $fri_name
        
                    </div>
        
                </div>
                <div class='ten_content'>
                $rel_time
        
                </div>
            </div>
        </div>

        ");
     }

     exit();

}


?> 
      