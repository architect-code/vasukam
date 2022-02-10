<?php
require_once "../pdo.php";
session_start();

$user_main = $_SESSION["account"];

if(isset($_POST["join_group"])){
    $group_id = (int)$_POST["group_id"];

    $join_group_query = "
    INSERT INTO grp_user_rel (grp_id, user_id, relation) VALUES (:gi, :ui, :rl);
    UPDATE grps SET members = members + 1 WHERE grp_id = :gi;
    INSERT INTO notification (user1_id, user2_id, notification) VALUES (:ui ,1, :ms);
    ";

    $stmt_join_group_query = $pdo->prepare($join_group_query);
    $stmt_join_group_query->execute(array(
        ":gi"=>$group_id,
        ":ui"=>$user_main,
        ":rl"=>"F",
        ":ms"=>"You joined a new group, welcome to the group",
    ));

    echo("save");

}

if(isset($_POST["remove_group"])){
    $group_id = (int)$_POST["group_id"];

    $remove_group_query = "
    DELETE FROM grp_user_rel WHERE grp_id = :gi AND user_id = :ui;
    UPDATE grps SET members = members - 1 WHERE grp_id = :gi;
    INSERT INTO notification (user1_id, user2_id, notification) VALUES (:ui ,1, :ms);
    ";

    $stmt_remove_group_query = $pdo->prepare($remove_group_query);
    $stmt_remove_group_query->execute(array(
        ":gi"=>$group_id,
        ":ui"=>$user_main,
        ":ms"=>"You left a group, find a new group of your liking",
    ));

    echo("save");

}


?>