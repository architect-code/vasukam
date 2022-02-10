<?php
session_start();
require_once "../pdo.php";

$user_main = $_SESSION["account"];


    $post_query = "SELECT
    us2.name as fri_name,
    ch.last_message as last_message,
    ch.message_time as mes_time,
    us2.image_url as imageurl
    FROM 
    users us1 JOIN chat_request ch ON us1.user_id = ch.user1_id 
    JOIN users us2 ON ch.user2_id = us2.user_id
    WHERE us1.user_id = :um
    ORDER BY ch.message_time DESC;";

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
    Greetings from Vasukam, this service is not started yet, we are working on it at priority
    </div>
    
    </section>
      
      ");
      exit();

}
else{
    foreach($result as $row) {
        // echo("<script>console.log('checl1');</script>");
        $fri_name = $row["fri_name"];
        $last_message = $row["last_message"];
        $mes_time = $row["mes_time"];
        $imageurl = $row["imageurl"];

        echo("
        <div class='five_info_section'>
        <div class='five_pic_section'>
            <img src=$imageurl>
        </div>
        <div class='six_meta'>
            <div class='seven_head_date'>
                <div class='eight_head'>
                    $fri_name
    
                </div>
                <div class='nine_date'>
                    $mes_time
    
                </div>
            </div>
            <div class='ten_content'>
                $last_message
    
            </div>
        </div>
    </div>
");
     }

     exit();

}

?>

