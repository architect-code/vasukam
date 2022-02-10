<?php
session_start();
require_once "../pdo.php";

if(isset($_POST["search_check"])){
    $search_query = "%".trim($_POST["search_query"])."%";
    $search_user_query = "SELECT username, image_url, user_id
     FROM users 
     WHERE username LIKE :qu";

$stmt_user_query = $pdo->prepare($search_user_query);

$stmt_user_query->execute(array(
    ":qu"=>$search_query,

));


$result=$stmt_user_query->fetchAll(PDO::FETCH_ASSOC);
$stmt_user_query->closeCursor();
if(count($result)==0){
    // echo("
    // <section style = 'width: 100vw; display: flex; align-items: center; justify-content: center'
    
    
    // no result found
    // ");

}
else{
    echo("
    <section class = 'four_users'>
    <div class = 'four_users_heading'>
            People");

    foreach($result as $row){
        $username = $row["username"];
        $image_url  = $row["image_url"];
        $other_user_id = $row["user_id"];
        echo("

       
    </div>
            <div class = 'five_user_box' onclick = 'other_user_profile(this)'>
            <div class = 'other_user_id' style = 'display: none;'>$other_user_id</div>
                <div class = 'six_user_image'>
                    <img src=$image_url>
    </div>
    <div class = 'seven_user_username'>
        $username
    </div>
    </div>
    ");
   

    }
    echo(" </section>
    ");
    
}

$search_group_query = "SELECT grpname, image_url, grp_id
FROM grps WHERE grpname
 LIKE :qi";

$stmt_group_query = $pdo->prepare($search_group_query);

$stmt_group_query->execute(array(
    ":qi"=>$search_query,

));


$result2=$stmt_group_query->fetchAll(PDO::FETCH_ASSOC);
$stmt_group_query->closeCursor();
if(count($result2) == 0){
    // echo("no result found");

}
else{
    echo("
    <section class = 'four_groups'>
    <div class = 'four_groups_heading'>
            Groups");

    foreach($result2 as $row){
        $grpname = $row["grpname"];
        $image_url  = $row["image_url"];
        $grp_id = $row["grp_id"];
        echo("

       
    </div>
            <div class = 'five_group_box' onclick = 'group_profile(this)'>
            <div class = 'group_id' style = 'display: none;'>$grp_id</div>
                <div class = 'six_group_image'>
                    <img src=$image_url>
    </div>
    <div class = 'seven_group_groupname'>
        $grpname
    </div>
    </div>
    ");
   

    }
    echo(" </section>
    ");
    
}






}

