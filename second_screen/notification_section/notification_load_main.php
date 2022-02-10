<script src="notification_section/notification_notification.js" type="text/javascript" defer></script>
<?php
session_start();
require_once "../pdo.php";

$user_main = $_SESSION["account"];

// echo($home_main);
// echo($_SESSION["home_main"]);
// $home_main = "people";
// echo("<script>console.log('checl1');</script>");



    $post_query = "SELECT
    nf.notify_time as nf_time,
    nf.notification as nf,
    us2.image_url as imageurl,
    us2.user_id as other_user_id
    FROM users us1 JOIN notification nf ON us1.user_id = nf.user1_id
    JOIN users us2 ON us2.user_id = nf.user2_id
    WHERE us1.user_id = :um
    ORDER BY nf.notify_time DESC;";

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
    Greetings from Vasukam, you dont have any new notification
    </div>
    
    </section>
      
      ");
      exit();

}

else{
    foreach($result as $row) {
        // echo("<script>console.log('checl1');</script>");
        $nf= $row["nf"];
        $nf_time = $row["nf_time"];
        $imageurl = $row["imageurl"];
        $other_user_id = $row["other_user_id"];
    
        echo("
        <div class='five_info_section' onclick = 'show_other_user(this)'>
        <div style = 'display:none;'>$other_user_id</div>
                    <div class='five_pic_section'>
                        <img src=$imageurl>
                    </div>
                    <div class='six_meta'>
                        <div class='seven_head_date'>
                            <div class='eight_head notification_head'>
                                $nf
                
                            </div>
                            <div class='nine_date'>
                                $nf_time
                
                            </div>
                        </div>
                    
                    </div>
                </div>
                ");
    }
    exit();

}


?>