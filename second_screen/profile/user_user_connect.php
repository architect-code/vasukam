<?php
require_once "../pdo.php";
session_start();

$user_main = $_SESSION["account"];
$other_user = (int)$_SESSION["other_user_id"];

if(isset($_POST["send_friend_request"])){
    $query = "INSERT INTO user_user_rel (user1_id, user2_id, relation, relation_time)
     VALUES(:ui1, :ui2, :rl1, CURRENT_TIMESTAMP() ) 
     ON DUPLICATE KEY UPDATE relation= :rl1, 
     relation_time = CURRENT_TIMESTAMP();
     INSERT INTO user_user_rel (user1_id, user2_id, relation, relation_time)
     VALUES(:ui2, :ui1, :rl2, CURRENT_TIMESTAMP() ) 
     ON DUPLICATE KEY UPDATE relation= :rl2, 
     relation_time = CURRENT_TIMESTAMP();
     INSERT INTO notification (user1_id, user2_id, notification) VALUES (:ui2, :ui1, :nf);
     UPDATE users SET num_follower = num_follower + 1 WHERE user_id = :ui2;
     UPDATE users SET num_following = num_following + 1 WHERE user_id = :ui1";

     $stmt = $pdo->prepare($query);
     $stmt->execute(array(
         ":ui1"=>$user_main,
         ":ui2"=>$other_user,
         ":rl1"=>"C",
         ":rl2"=>"D",
         ":nf"=>"You received a new connect request",
     ));

     echo("save");
}


if(isset($_POST["follow_request"])){
    $query = "INSERT INTO user_user_rel (user1_id, user2_id, relation, relation_time)
     VALUES(:ui1, :ui2, :rl1, CURRENT_TIMESTAMP() ) 
     ON DUPLICATE KEY UPDATE relation= :rl1, 
     relation_time = CURRENT_TIMESTAMP();
     INSERT INTO user_user_rel (user1_id, user2_id, relation, relation_time)
     VALUES(:ui2, :ui1, :rl2, CURRENT_TIMESTAMP() ) 
     ON DUPLICATE KEY UPDATE relation= :rl2, 
     relation_time = CURRENT_TIMESTAMP();
     INSERT INTO notification (user1_id, user2_id, notification) VALUES (:ui2, :ui1, :nf);
     UPDATE users SET num_follower = num_follower + 1 WHERE user_id = :ui2;
     UPDATE users SET num_following = num_following + 1 WHERE user_id = :ui1";

     $stmt = $pdo->prepare($query);
     $stmt->execute(array(
         ":ui1"=>$user_main,
         ":ui2"=>$other_user,
         ":rl1"=>"A",
         ":rl2"=>"B",
         ":nf"=>"You received a new follower",
     ));

     echo("save");
}

if(isset($_POST["remove_friend"])){
    $query = "DELETE FROM user_user_rel WHERE user1_id = :ui1 AND user2_id = :ui2;
    DELETE FROM user_user_rel WHERE user1_id = :ui2 AND user2_id = :ui1;
     INSERT INTO notification (user1_id, user2_id, notification) VALUES (:ui2, :ui1, :nf);
     UPDATE users SET num_friend = num_friend - 1 WHERE user_id = :ui2;
     UPDATE users SET num_friend = num_friend - 1 WHERE user_id = :ui1";

     $stmt = $pdo->prepare($query);
     $stmt->execute(array(
         ":ui1"=>$user_main,
         ":ui2"=>$other_user,
         ":nf"=>"You lost a friend, find a new one",
     ));

     echo("save");
}

if(isset($_POST["stop_following"])){
    $query = "DELETE FROM user_user_rel WHERE user1_id = :ui1 AND user2_id = :ui2;
    DELETE FROM user_user_rel WHERE user1_id = :ui2 AND user2_id = :ui1;
     INSERT INTO notification (user1_id, user2_id, notification) VALUES (:ui2, :ui1, :nf);
     UPDATE users SET num_follower = num_follower - 1 WHERE user_id = :ui2;
     UPDATE users SET num_following = num_following - 1 WHERE user_id = :ui1";

     $stmt = $pdo->prepare($query);
     $stmt->execute(array(
         ":ui1"=>$user_main,
         ":ui2"=>$other_user,
         ":nf"=>"You lost a follower",
     ));

     echo("save");
}

if(isset($_POST["remove_friend_request"])){
    $query = "DELETE FROM user_user_rel WHERE user1_id = :ui1 AND user2_id = :ui2;
    DELETE FROM user_user_rel WHERE user1_id = :ui2 AND user2_id = :ui1;
     INSERT INTO notification (user1_id, user2_id, notification) VALUES (:ui2, :ui1, :nf);
     UPDATE users SET num_follower = num_follower - 1 WHERE user_id = :ui2;
     UPDATE users SET num_following = num_following - 1 WHERE user_id = :ui1";

     $stmt = $pdo->prepare($query);
     $stmt->execute(array(
         ":ui1"=>$user_main,
         ":ui2"=>$other_user,
         ":nf"=>"You lost a follower and a potential friend",
     ));

     echo("save");
}

if(isset($_POST["accept_friend_request_from_D"])){
    $query = "INSERT INTO user_user_rel (user1_id, user2_id, relation, relation_time)
     VALUES(:ui1, :ui2, :rl1, CURRENT_TIMESTAMP() ) 
     ON DUPLICATE KEY UPDATE relation= :rl1, 
     relation_time = CURRENT_TIMESTAMP();
     INSERT INTO user_user_rel (user1_id, user2_id, relation, relation_time)
     VALUES(:ui2, :ui1, :rl2, CURRENT_TIMESTAMP() ) 
     ON DUPLICATE KEY UPDATE relation= :rl2, 
     relation_time = CURRENT_TIMESTAMP();
     INSERT INTO notification (user1_id, user2_id, notification) VALUES (:ui2, :ui1, :nf);
     UPDATE users SET num_follower = num_follower - 1 WHERE user_id = :ui2;
     UPDATE users SET num_following = num_following - 1 WHERE user_id = :ui1;
     UPDATE users SET num_friend = num_friend + 1 WHERE user_id = :ui2;
     UPDATE users SET num_friend = num_friend + 1 WHERE user_id = :ui1";

     $stmt = $pdo->prepare($query);
     $stmt->execute(array(
         ":ui1"=>$user_main,
         ":ui2"=>$other_user,
         ":rl1"=>"F",
         ":rl2"=>"F",
         ":nf"=>"You made a new friend say hi",
     ));

     echo("save");
}

if(isset($_POST["accept_friend_request_from_G"])){
    $query = "INSERT INTO user_user_rel (user1_id, user2_id, relation, relation_time)
     VALUES(:ui1, :ui2, :rl1, CURRENT_TIMESTAMP() ) 
     ON DUPLICATE KEY UPDATE relation= :rl1, 
     relation_time = CURRENT_TIMESTAMP();
     INSERT INTO user_user_rel (user1_id, user2_id, relation, relation_time)
     VALUES(:ui2, :ui1, :rl2, CURRENT_TIMESTAMP() ) 
     ON DUPLICATE KEY UPDATE relation= :rl2, 
     relation_time = CURRENT_TIMESTAMP();
     INSERT INTO notification (user1_id, user2_id, notification) VALUES (:ui2, :ui1, :nf);
     UPDATE users SET num_friend = num_friend + 1 WHERE user_id = :ui2;
     UPDATE users SET num_friend = num_friend + 1 WHERE user_id = :ui1";

     $stmt = $pdo->prepare($query);
     $stmt->execute(array(
         ":ui1"=>$user_main,
         ":ui2"=>$other_user,
         ":rl1"=>"F",
         ":rl2"=>"F",
         ":nf"=>"You made a new friend say hi",
     ));

     echo("save");
}

if(isset($_POST["stop_following_send_connect_request"])){
    $query = "INSERT INTO user_user_rel (user1_id, user2_id, relation, relation_time)
    VALUES(:ui1, :ui2, :rl1, CURRENT_TIMESTAMP() ) 
    ON DUPLICATE KEY UPDATE relation= :rl1, 
    relation_time = CURRENT_TIMESTAMP();
    INSERT INTO user_user_rel (user1_id, user2_id, relation, relation_time)
    VALUES(:ui2, :ui1, :rl2, CURRENT_TIMESTAMP() ) 
    ON DUPLICATE KEY UPDATE relation= :rl2, 
    relation_time = CURRENT_TIMESTAMP();
    INSERT INTO notification (user1_id, user2_id, notification) VALUES (:ui2, :ui1, :nf);
    UPDATE users SET num_follower = num_follower - 1 WHERE user_id = :ui2;
    UPDATE users SET num_following = num_following - 1 WHERE user_id = :ui1";

    $stmt = $pdo->prepare($query);
    $stmt->execute(array(
        ":ui1"=>$user_main,
        ":ui2"=>$other_user,
        ":rl1"=>"E",
        ":rl2"=>"G",
        ":nf"=>"You lost a follower",
    ));

    echo("save");

}

if(isset($_POST["make_friends"])){
    $query = "INSERT INTO user_user_rel (user1_id, user2_id, relation, relation_time)
    VALUES(:ui1, :ui2, :rl1, CURRENT_TIMESTAMP() ) 
    ON DUPLICATE KEY UPDATE relation= :rl1, 
    relation_time = CURRENT_TIMESTAMP();
    INSERT INTO user_user_rel (user1_id, user2_id, relation, relation_time)
    VALUES(:ui2, :ui1, :rl2, CURRENT_TIMESTAMP() ) 
    ON DUPLICATE KEY UPDATE relation= :rl2, 
    relation_time = CURRENT_TIMESTAMP();
    INSERT INTO notification (user1_id, user2_id, notification) VALUES (:ui2, :ui1, :nf);
    UPDATE users SET num_follower = num_follower - 1 WHERE user_id = :ui1;
    UPDATE users SET num_following = num_following - 1 WHERE user_id = :ui2;
    UPDATE users SET num_friend = num_friend + 1 WHERE user_id = :ui2;
    UPDATE users SET num_friend = num_friend + 1 WHERE user_id = :ui1";

    $stmt = $pdo->prepare($query);
    $stmt->execute(array(
        ":ui1"=>$user_main,
        ":ui2"=>$other_user,
        ":rl1"=>"F",
        ":rl2"=>"F",
        ":nf"=>"You made a new friend say hi",
    ));

    echo("save");

}

?>