<?php 
session_start();
require_once "pdo.php";
 

if(isset($_POST['save'])){
    if(isset($_SESSION["email"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])){

    $signup = "INSERT INTO users (email, username, password, verified, name, dob, image_url, dhan)
    VALUES (:em, :un, :pw, :vf, :nm, :db, :iu, :dh)";
    $stmt3 = $pdo->prepare($signup);
    $stmt3->execute(array(
        ":em"=>$_SESSION["email"],
        ":un"=>$_SESSION["username"],
        ":pw"=>$_SESSION["password"],
        ":nm"=>$_POST["name"],
        ":db"=>$_POST["dob"],
        ":iu"=>$_POST["image_url"],
        ":vf"=> FALSE,
        ":dh"=>1000,
    ));

  

    
    $login = "SELECT user_id FROM users WHERE username = :unm";

    $stmt4 = $pdo->prepare($login);
    $stmt4->execute(array(
        ":unm"=>$_SESSION["username"],
    ));



    $result3=$stmt4->fetch(PDO::FETCH_ASSOC);
    $user_id=$result3['user_id'];

    $welcome_message = "Welcome to Vasukam ".$_SESSION["username"].". We wish you a wonderful time here.";

    unset($_SESSION["email"]);
    unset($_SESSION["username"]);
    unset($_SESSION["password"]);


        
        $add_data = "INSERT INTO user_user_rel (user1_id, user2_id, relation) VALUES (:ud,:ud,'S');
        INSERT INTO grp_user_rel (grp_id, user_id, relation) VALUES (1, :ud, 'F');
        INSERT INTO user_user_rel (user1_id, user2_id, relation) VALUES (1,:ud,'F');
        INSERT INTO user_user_rel (user1_id, user2_id, relation) VALUES (:ud, 1,'F');
        INSERT INTO notification (user1_id, user2_id, notification) VALUES (:ud,1, :wm);
        
        ";

        $stmt1 = $pdo->prepare($add_data);
        $stmt1->execute(array(
            ":ud"=>$user_id,
            ":wm"=>$welcome_message,
        ));


        // $_SESSION["success"]="complete_signup";

        $_SESSION["account"]=$user_id;
        $_SESSION["success"]="login";



        setcookie("account", $_SESSION["account"], time() + (86400 * 2), "/");
        setcookie("success", $_SESSION["success"], time() + (86400 * 2), "/");
        unset($_SESSION["email"]);
        unset($_SESSION["username"]);
        unset($_SESSION["password"]);


        echo "saved";

        exit();

    }

    else{
        echo "error";
        exit();
    }



}



 
?>