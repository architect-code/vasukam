<?php
require_once "../pdo.php";
session_start();

if(isset($_POST["accept_bid_offer"])){

    $bid_id = (int)$_POST["bid_id"];
    $user_main = $_SESSION["account"];

    $query_get_data = "SELECT
    post_id as post_id,
    bidder_id as bidder_id,
    bid_price_value as bid_price_value
    FROM 
    bid_price
    WHERE bid_price_id = :bi";
    
    $stmt_get_data  = $pdo->prepare($query_get_data);
    $stmt_get_data->execute(array(
        ":bi"=>$bid_id,
    ));

    $result_get_data = $stmt_get_data->fetch(PDO::FETCH_ASSOC);
    $post_id = (int)$result_get_data["post_id"];
    $bidder_id = (int)$result_get_data["bidder_id"];
    $bid_price_value = (int)$result_get_data["bid_price_value"];
    $stmt_get_data->closeCursor();




    $check_balance_query = "SELECT dhan as money FROM users WHERE user_id = :bid;";
    $stmt_check_balance_query = $pdo->prepare($check_balance_query);
    $stmt_check_balance_query->execute(array(
        ":bid"=>$bidder_id,
    ));

    $result_balance=$stmt_check_balance_query->fetch(PDO::FETCH_ASSOC);
    $stmt_check_balance_query->closeCursor();

    if((int)$result_balance["money"]<$bid_price_value){
       
        $remove_bid_offer_query = "DELETE FROM bid_price WHERE bid_price_id = :bi;";
        $stmt_remove_bid_offer = $pdo->prepare($remove_bid_offer_query);
        $stmt_remove_bid_offer->execute(array(
            ":bi"=>$bid_id,
        ));
        $stmt_remove_bid_offer->closeCursor();
        echo("less balance");
        exit();
    }
    else{
    $buy_post_query = "DELETE FROM ask_price WHERE post_id = :pid;
    DELETE FROM bid_price WHERE post_id = :pid;
    INSERT INTO transact (buyer_id, seller_id, price, post_id) VALUES (:bid, :si, :pr, :pid);
    UPDATE post_data SET owner_id = :bid  WHERE post_id = :pid;
    UPDATE users SET dhan = dhan + :pr  WHERE user_id = :si;
    UPDATE users SET dhan = dhan - :pr  WHERE user_id = :bid;
    UPDATE users SET num_post = num_post + 1 WHERE user_id = :bid;
    UPDATE users SET num_post = num_post - 1 WHERE user_id = :si;";

    $stmt_buy_post_query = $pdo->prepare($buy_post_query);
    $stmt_buy_post_query->execute(array(
        ":pid"=>$post_id,
        ":bid"=>$bidder_id,
        ":si"=>$user_main,
        ":pr"=>$bid_price_value,
    ));

    echo("save");
    exit();
}

}


if(isset($_POST["reject_bid_offer"])){
    $bid_id = (int)$_POST["bid_id"];
    $remove_bid_offer_query = "DELETE FROM bid_price WHERE bid_price_id = :bi;";
    $stmt_remove_bid_offer = $pdo->prepare($remove_bid_offer_query);
    $stmt_remove_bid_offer->execute(array(
        ":bi"=>$bid_id,
    ));
    echo("save");
    exit();

}

?>