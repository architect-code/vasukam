<?php 
session_start();
require_once "pdo.php";
unset($_SESSION["account"]);
unset($_SESSION["success"]);
unset($_COOKIE['account']);
setcookie('account', '', 1, '/'); 
unset($_COOKIE['success']);
setcookie('success', '', 1, '/'); 

  if (isset($_POST['username_check'])) {
    $check_username = "SELECT * FROM users WHERE username=:un";
    $stmt1 = $pdo->prepare($check_username);
    $stmt1->execute(array(":un"=>$_POST["username"],));

    $result1=$stmt1->fetch(PDO::FETCH_ASSOC);
    if($result1===FALSE){
        echo("not_taken");
    }

    else{
        echo("taken");
    }

    exit();

}

if (isset($_POST['email_check'])) {


    // var_dump($_POST);



    $check_email = "SELECT * FROM users WHERE email=:em";
    $stmt2 = $pdo->prepare($check_email);
    $stmt2->execute(array(":em"=>$_POST["email"],));
    

    $result2=$stmt2->fetch(PDO::FETCH_ASSOC);
    if($result2===FALSE){
        echo("not_taken");
    }

    else{
        echo("taken");
    }

    exit();

}

if(isset($_POST['save'])){

    $_SESSION["email"] = $_POST["email"];
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $_POST["password"];


    echo "saved";
    exit();
}

?>