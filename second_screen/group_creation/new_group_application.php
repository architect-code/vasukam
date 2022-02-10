<?php
require_once "../pdo.php";
session_start();
// $_SESSION["account"]=42;
$user_main = $_SESSION["account"];

if(isset($_POST["group_name_check"])){
    $grp_name = $_POST["grp_name"];

    $check_grp_query = "SELECT * FROM grps WHERE grps.grpname = :gn";

    $stmt_grp_name = $pdo->prepare($check_grp_query);
    $stmt_grp_name->execute(array(
        ":gn"=>$grp_name,
    ));

    $result = $stmt_grp_name->fetch(PDO::FETCH_ASSOC);
    if($result===FALSE){
        echo("not_exist");
    }

    else{
        echo("exist");
    }
}

if(isset($_POST["grp_save"])){
    $grp_name = $_POST["grp_name"];
    $grp_des = $_POST["grp_des"];
    $image_url = $_POST["image_url"];

    $add_grp_query = "INSERT INTO grps (grpname, creator_id, image_url, grp_des)
     VALUES (:gn, :um, :iu, :gd);";

    $stmt_grp_add = $pdo->prepare($add_grp_query);
    $stmt_grp_add->execute(array(
        ":gn"=>$grp_name,
        ":um"=>$user_main,
        ":iu"=>$image_url,
        ":gd"=>$grp_des,
    ));

    $stmt_grp_add->closeCursor();

    $get_group_id_query = "SELECT grp_id FROM grps WHERE grpname = :grpnm;";
    $stmt_get_group_id = $pdo->prepare($get_group_id_query);
    $stmt_get_group_id->execute(array(
        ":grpnm"=>$grp_name,
    ));

    $result = $stmt_get_group_id->fetch(PDO::FETCH_ASSOC);

    $stmt_get_group_id->closeCursor();

    unset($_SESSION["group_id"]);
    $_SESSION["group_id"] = $result["grp_id"];
    $user_grp_rel_query = "INSERT INTO grp_user_rel 
    (grp_id, user_id, relation) 
    VALUES (:gi, :ui, :re);";
     $stmt_user_grp_rel_query = $pdo->prepare($user_grp_rel_query);
     $stmt_user_grp_rel_query->execute(array(
         ":gi"=>$_SESSION["group_id"],
         ":ui"=>$user_main,
         ":re"=>"F",
     ));
     echo("save");


}


?>