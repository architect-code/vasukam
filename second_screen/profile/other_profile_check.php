<?php
session_start();
// require_once "pdo.php";

if(isset($_POST["other_profile_check"])){
    unset($_SESSION["other_user_id"]);
    unset($_SESSION["profile"]);
    $_SESSION["other_user_id"] = $_POST["other_user_id"];
    $_SESSION["profile"] = $_POST["other_user_id"];
    echo("save");
    exit();
    
}

elseif(isset($_POST["group_check"])){
    unset($_SESSION["group_id"]);
    // unset($_SESSION["profile"]);
    $_SESSION["group_id"] = $_POST["group_group_id"];
    // $_SESSION["profile"] = $_POST["group_group_id"];
    echo("save");
    exit();

}