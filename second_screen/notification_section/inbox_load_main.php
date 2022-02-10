<script src="notification_section/notification_inbox.js" type="text/javascript" defer></script>
<script src="notification_section/biddings_post_bid.js" type="text/javascript" defer></script>
<?php
session_start();
require_once "../pdo.php";

$user_main = $_SESSION["account"];

// echo($home_main);
// echo($_SESSION["home_main"]);
// $home_main = "people";
// echo("<script>console.log('checl1');</script>");



    $post_query = "SELECT
    ib.inbox_time as ib_time,
    ib.inbox as ib,
    ib.bid_id as bid_id
    FROM users us JOIN inbox ib ON us.user_id = ib.user_id
    WHERE us.user_id = :um
    ORDER BY ib.inbox_time DESC;";

$stmt_people = $pdo->prepare($post_query);

$stmt_people->execute(array(
    ":um"=>$user_main,
));


$result=$stmt_people->fetchAll(PDO::FETCH_ASSOC);
if(count($result) == 0){
    echo("
    <section style='width: 100vw; height 30vw; display: flex;
    align-items: center; justify-content: center; margin-top: 2vw'>
    <div style='width: 92vw; border-radius: 2vw; background-color: #1e1e1e; color: white;
    display: flex; align-items: center; justify-content: center; padding: 2vw; font-size: 4vw;'>
    Greetings from Vasukam, you dont have any mail in your inbox
    </div>
    
    </section>
      
      ");
      exit();

}

else{
    foreach($result as $row) {
        // echo("<script>console.log('checl1');</script>");
        $ib= $row["ib"];
        $ib_time = $row["ib_time"];
        $imageurl = "random_image/vasukam.png";
        $bid_id = $row["bid_id"];
    
        echo("
        <div class='five_info_section' onclick = 'show_bidding_detail(this)'>
        <div class = 'bid_id' style = 'display: none'>$bid_id</div>
                    <div class='five_pic_section'>
                        <img src=$imageurl>
                    </div>
                    <div class='six_meta'>
                        <div class='seven_head_date'>
                            <div class='eight_head'>
                                $ib
                
                            </div>
                            <div class='nine_date'>
                                $ib_time
                
                            </div>
                        </div>
                    
                    </div>
                </div>
                ");
    }
    exit();

}


?>