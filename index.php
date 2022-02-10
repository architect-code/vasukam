<?php
session_start();
// require_once "pdo.php";

if(isset($_COOKIE["success"]) && isset($_COOKIE["account"])){
    $_SESSION["success"] = $_COOKIE["success"];
    $_SESSION["account"] = $_COOKIE["account"];
}



if(isset($_SESSION["success"]) && isset($_SESSION["account"])){
    if ($_SESSION["success"]==="login" && is_int($_SESSION["account"])){;
        header("Location: second_screen/second_screen.php");
        return;
    }


    else{

        header("Location: first_screen/first_screen.php");
        return;
        }
}

else{
    header("Location: first_screen/first_screen.php");
    return;
}




?>