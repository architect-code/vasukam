<?php 
session_start();
require_once "pdo.php";

unset($_COOKIE['account']);
setcookie('account', '', 1, '/'); 
unset($_COOKIE['success']);
setcookie('success', '', 1, '/'); 
unset($_SESSION["account"]);
unset($_SESSION["success"]);

  if (isset($_POST['username_check'])) {



 
    // var_dump($_POST);

    $check_username = "SELECT * FROM users WHERE username=:un";
    $stmt1 = $pdo->prepare($check_username);
    $stmt1->execute(array(":un"=>$_POST["username"],));

    $result1=$stmt1->fetch(PDO::FETCH_ASSOC);
    if($result1===FALSE){
        echo "not_exist";
    }

    else{
        echo "exist";
    }

    exit();

}



if(isset($_POST['save'])){
    unset($_SESSION["account"]);
    unset($_SESSION["success"]);
    $login = "SELECT user_id FROM users WHERE username = :un AND password=:pw";
    $stmt2 = $pdo->prepare($login);
    $stmt2->execute(array(
        ":un"=>$_POST["username"],
        ":pw"=>$_POST["password"],
    ));

    $result2=$stmt2->fetch(PDO::FETCH_ASSOC);
    if($result2===FALSE){
        echo "error";
        exit();
    
    }
    else {
    $_SESSION["account"]=$result2['user_id'];
    $_SESSION["success"]="login";

    setcookie("account", $_SESSION["account"], time() + (86400 * 2), "/");
    setcookie("success", $_SESSION["success"], time() + (86400 * 2), "/");

    echo "login";
    exit();
    }


}


?>