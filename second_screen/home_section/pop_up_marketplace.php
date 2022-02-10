<?php
require_once "../pdo.php";
session_start();
// $user_main = $_SESSION["account"];

if(isset($_POST["set_price"])){
    unset($_SESSION["post_id"]);
    $_SESSION["post_id"] = (int)$_POST["post_id"];

    echo("

    <div class = 'pop_up_marketplace_body'>
    <div class = 'pop_up_marketplace_cancel'>
    <i class='far fa-times-circle' onclick = 'pop_up_marketplace_cancel()'></i>
</div>
<div class = 'pop_up_marketplace_action'>
    <div class = 'pop_up_marketplace_action_field'>
<input type='number' name='marketplace_value_set_price' id='marketplace_value_set_price' placeholder='VATS' autofocus> 
<i class='fab fa-vuejs'></i>
</div>
<div class='pop_up_marketplace_action_button'>
<button class='sub' type='button' id = 'marketplace_button_set_price' onclick = 'marketplace_button_set_price()'>Set Price</button>
</div>

</div>


</div>
    
    
    ");
    exit();
}

if(isset($_POST["set_price_value"])){
    $post_id  = $_SESSION["post_id"];
    $post_set_price = $_POST["post_price"];

    $set_ask_price = "INSERT INTO ask_price (post_id, ask_price) VALUES (:pi, :ap);";
    $stmt_set_ask_price = $pdo->prepare($set_ask_price);
    $stmt_set_ask_price->execute(array(
        ":pi"=>$post_id,
        ":ap"=>$post_set_price,
    ));

    echo("save");
    exit();
}

if(isset($_POST["remove_set_price"])){
    $post_id  = $_POST["post_id"];

    $remove_ask_price = "DELETE FROM ask_price WHERE post_id = :pid";

    $stmt_remove_ask_price = $pdo->prepare($remove_ask_price);
    $stmt_remove_ask_price->execute(array(
        ":pid"=>$post_id,
    ));

    echo("
    save    
    ");
    exit();
}

if(isset($_POST["make_offer"])){
    unset($_SESSION["post_id"]);
    $_SESSION["post_id"] = (int)$_POST["post_id"];
    $_SESSION["post_owner_id"] = (int)$_POST["owner_id"];
    // $post_id = $_SESSION["post_id"];

    echo("
    

    <div class = 'pop_up_marketplace_body'>
    <div class = 'pop_up_marketplace_cancel'>
    <i class='far fa-times-circle' onclick = 'pop_up_marketplace_cancel()'></i>
</div>
<div class = 'pop_up_marketplace_action'>
    <div class = 'pop_up_marketplace_action_field'>
<input type='number' name='marketplace_value_make_offer' id='marketplace_value_make_offer' placeholder='VATS' autofocus> 
<i class='fab fa-vuejs'></i>
</div>
<div class='pop_up_marketplace_action_button'>
<button class='sub' type='button' id = 'marketplace_button_make_offer' onclick = 'marketplace_button_make_offer()'>make offer</button>
</div>

</div>


</div>
    
    
    ");
    exit();
}

if(isset($_POST["change_offer"])){
    unset($_SESSION["post_id"]);
    $_SESSION["post_id"] = (int)$_POST["post_id"];
    $_SESSION["post_owner_id"] = (int)$_POST["owner_id"];
    // $post_id = $_SESSION["post_id"];

    echo("
    

    <div class = 'pop_up_marketplace_body'>
    <div class = 'pop_up_marketplace_cancel'>
    <i class='far fa-times-circle' onclick = 'pop_up_marketplace_cancel()'></i>
</div>

<div class = 'pop_up_marketplace_previous_offer'>
previous offer: 43 <i class='fab fa-vuejs' style = 'padding-left:1vw;'></i>

</div>

<div class = 'pop_up_marketplace_remove_offer' onclick = 'remove_offer()'>
remove offer

</div>

<div class = 'pop_up_marketplace_action'>

    <div class = 'pop_up_marketplace_action_field'>
<input type='number' name='marketplace_value_make_offer' id='marketplace_value_make_offer' placeholder='VATS' autofocus> 
<i class='fab fa-vuejs'></i>
</div>
<div class='pop_up_marketplace_action_button'>
<button class='sub' type='button' id = 'marketplace_button_make_offer' onclick = 'marketplace_button_make_offer()'>change offer</button>
</div>

</div>


</div>
    
    
    ");
    exit();
}


if(isset($_POST["make_offer_value"])){
    $post_id  = (int)$_SESSION["post_id"];
    $offer_value = $_POST["offer_value"];
    $user_main = $_SESSION["account"];
    $owner_id =  $_SESSION["post_owner_id"];
  

    $make_offer_query = "DELETE FROM bid_price WHERE post_id = :pi AND bidder_id = :bi;
    INSERT INTO bid_price (post_id, bidder_id, bid_price_value) VALUES (:pi,:bi,:bp);
    INSERT INTO inbox (user_id, inbox, bid_id) VALUES (:oi, :ib, LAST_INSERT_ID());";
    $stmt_make_offer = $pdo->prepare($make_offer_query);
    $stmt_make_offer->execute(array(
        ":bp"=>$offer_value,
        ":pi"=>$post_id,
        ":bi"=>$user_main,  
        ":oi"=>$owner_id,
        ":ib"=>"Someone interested in one of your post",
    ));
    unset($_SESSION["post_owner_id"]);

    echo("save");
    exit();
}


if(isset($_POST["buy_post"])){
    $user_main = $_SESSION["account"];
    $post_id  = (int)$_POST["post_id"];
    $owner_id = (int)$_POST["owner_id"];
    $ask_price_value = (int)$_POST["ask_price_value"];

    $check_balance_query = "SELECT dhan as money FROM users WHERE user_id = :pb;";
    $stmt_check_balance_query = $pdo->prepare($check_balance_query);
    $stmt_check_balance_query->execute(array(
        ":pb"=>$user_main,
    ));

    $result=$stmt_check_balance_query->fetch(PDO::FETCH_ASSOC);
    $stmt_check_balance_query->closeCursor();

    if((int)$result["money"]<$ask_price_value){
        echo("less balance");
        exit();
    }
    else{
    $buy_post_query = "DELETE FROM ask_price WHERE post_id = :pid;
    DELETE FROM bid_price WHERE post_id = :pid;
    INSERT INTO transact (buyer_id, seller_id, price, post_id) VALUES (:bi, :si, :pr, :pid);
    UPDATE post_data SET owner_id = :bi  WHERE post_id = :pid;
    UPDATE users SET dhan = dhan + :pr  WHERE user_id = :si;
    UPDATE users SET dhan = dhan - :pr  WHERE user_id = :bi;
    UPDATE users SET num_post = num_post + 1 WHERE user_id = :bi;
    UPDATE users SET num_post = num_post - 1 WHERE user_id = :si;";

    $stmt_buy_post_query = $pdo->prepare($buy_post_query);
    $stmt_buy_post_query->execute(array(
        ":pid"=>$post_id,
        ":bi"=>$user_main,
        ":si"=>$owner_id,
        ":pr"=>$ask_price_value,
    ));

    echo("save");
    exit();
}
}

if(isset($_POST["remove_offer"])){
    $post_id = $_SESSION["post_id"];
    $user_main = $_SESSION["account"];
    $remove_offer_query = "DELETE FROM bid_price WHERE post_id = :pi AND bidder_id = :bi;";

    $stmt = $pdo->prepare($remove_offer_query);
    $stmt->execute(array(
        ":pi" => $post_id,
        ":bi" => $user_main,
    ));

    echo("save");

}



?>











