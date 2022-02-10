
<script src="new_post_section/pop_up_groups.js" type="text/javascript" defer></script>
<?php

session_start();
require_once "../pdo.php";

$user_main = $_SESSION["account"];

$group_query = "SELECT 
gp.grp_id as group_id,
gp.grpname as groupname,
gp.image_url as imageurl
FROM users us JOIN grp_user_rel gur ON us.user_id = gur.user_id
JOIN grps gp ON gp.grp_id = gur.grp_id
WHERE us.user_id = :um
ORDER BY gur.relation_time";

$stmt_grp = $pdo->prepare($group_query);
$stmt_grp->execute(array(
    ":um"=>$user_main,
));

$result=$stmt_grp->fetchAll(PDO::FETCH_ASSOC);

if(count($result)==0){
   

    echo("
    
    <section class='pop_up_grp_main' id='pop_up_grp_main' >
<section class='two_group_popup' style='height: 15vw; align-items: center; justify-content: center; display: flex; padding-top:0;'>
   
    <div class='pop_up_group_body' style='color: white; font-size: 1.2rem; padding-left: 2vw; padding-right: 2vw;
    padding-top:0;
     height: auto; display: flex; algin-items: center;'>
    You are not a memeber of any group
    </div>
    </section>
    </section>
    <script>

    
    
    ");
    exit();
    
}


else{
    
    echo("
    <section class='pop_up_grp_main' id='pop_up_grp_main'>
<section class='two_group_popup'>
    <div class='pop_up_group_heading'>
        Choose a group

    </div>
    <div class='pop_up_group_body'>
    
    ");

    foreach($result as $row) {
        // echo("<script>console.log('checl1');</script>");
        $group_id = $row['group_id'];
        $groupname = $row['groupname'];
        $imageurl = $row['imageurl'];
        echo("
        <div class='pop_up_group_info'>
        <div style = 'display: none;'> $group_id </div>
        <div class='pop_up_image'>
     
            <img src=$imageurl>
        </div>
        <div class='pop_up_meta'>
            $groupname
        </div>
    </div>
        
        
        ");

    }

    echo("   </div>
    </section>
    </section>

    
 
    
    ");

    exit();


}




?>






 


