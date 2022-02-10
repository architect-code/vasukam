

<?php
require_once "../pdo.php";
session_start();

if(isset($_POST["see_offer"])){
    $bid_id = (int)$_POST["bid_id"];
    $query = "SELECT
    us.username as bidder_name,
    us.image_url as bidder_image_url,
    pd.heading as heading,
    pd.content_type as post_type,
    pd.content as content,
    bp.bid_price_value as bid_price
    FROM 
    bid_price bp JOIN users us JOIN post_data pd ON
    bp.bidder_id = us.user_id AND bp.post_id = pd.post_id
    WHERE bp.bid_price_id = :bi";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array(
        ":bi"=>$bid_id,
    ));

    $bid_res=$stmt->fetch(PDO::FETCH_ASSOC);
    if($bid_res===FALSE){
        echo("error");
    }

    else{
        $bidder_name = $bid_res["bidder_name"];
        $bidder_image_url = $bid_res["bidder_image_url"];
        $heading = $bid_res["heading"];
        $post_type = $bid_res["post_type"];
        $content = $bid_res["content"];
        $bid_price = $bid_res["bid_price"];
        



        echo("
        <div class = 'bid_offer_body'>
        <div class = 'bid_offer_cancel'>
        <i class='far fa-times-circle' onclick = 'close_pop_up_bid_offer()'></i>
        </div>
        <div class = 'bid_offer_bidder'>
        <div class = 'bid_offer_bidder_image'>
        <img src = $bidder_image_url>
        </div>
        <div class = 'bid_offer_bidder_username'>
        $bidder_name
        </div>
        </div>

        <div>
        <div class = 'bid_offer_post'>
        <div class = 'bid_offer_post_head'>
        $heading
         </div>");

        if($post_type == "I"){
            echo("
                 
            <div class= 'bid_offer_post_content_image'>
            <img src = $content>
            </div>
                ");

        }

        elseif($post_type == "T"){
            echo("
                 
        <div class= 'bid_offer_post_content_text'>
        $content

         </div>
            ");
        }

   

        echo("
        </div>
        <div class = 'bid_offer_bid_value'>
        Offer Price: $bid_price<i class='fab fa-vuejs' style = 'padding-left: 1vw'></i>
        </div>
        <div class = 'bid_offer_action_field'>
        <div class = 'bid_offer_action_accept' onclick = 'accept_bid_offer(this)'>
        <span class = 'bid_id' style = 'display: none'>$bid_id</span>
        Accept
        </div>
        <div class ='bid_offer_action_reject' onclick = 'reject_bid_offer(this)'>
        <span class = 'bid_id' style = 'display: none'>$bid_id</span>
        Reject
        </div>
        </div>
        </div>
        
        
        
        ");
    }
}




?>
