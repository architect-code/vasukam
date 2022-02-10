<script src="relation_section/relation_group.js" type="text/javascript" defer></script>
<?php
session_start();
require_once "../pdo.php";

$user_main = $_SESSION["account"];

    $post_query = "SELECT
    gp.grpname as grpname,
    gp.image_url as imageurl,
    gur.relation_time as relation_time,
    gp.grp_id as grp_id
    FROM users us JOIN grp_user_rel gur ON us.user_id = gur.user_id
    JOIN grps gp ON gp.grp_id = gur.grp_id
    WHERE (us.user_id = :um) AND (gur.relation = 'F')
    ORDER BY gur.relation_time DESC";

$stmt_people = $pdo->prepare($post_query);

$stmt_people->execute(array(
    ":um"=>$user_main,

));


$result=$stmt_people->fetchAll(PDO::FETCH_ASSOC);
if(count($result) == 0){
    echo("
    <div class = 'create_new_group_button' id = 'create_new_group_button' onclick = 'create_new_group()'> Create New Group</div>
    <section style='width: 100vw; height 30vw; display: flex;
    align-items: center; justify-content: center; margin-top: 2vw'>
    <div style='width: 92vw; border-radius: 2vw; background-color: #1e1e1e; color: white;
    display: flex; align-items: center; justify-content: center; padding: 2vw; font-size: 4vw;'>
    Greetings from Vasukam, join new groups
    </div>
    
    </section>
      
      ");

      exit();

}

else{
    echo("
    <div class = 'create_new_group_button' id = 'create_new_group_button' onclick = 'create_new_group()'> Create New Group</div>
    ");



    foreach($result as $row) {
        // echo("<script>console.log('checl1');</script>");
        $grpname = $row["grpname"];
        $imageurl = $row["imageurl"];
        $rel_time = $row["relation_time"];
        $grp_id = $row["grp_id"];

        echo("
        
        <div class='five_info_section load_group_profile'>
        <div class='group_group_id' style = 'display:none'>$grp_id</div>
            <div class='five_pic_section'>
                <img src=$imageurl>
            </div>
            <div class='six_meta'>
                <div class='seven_head_date'>
                    <div class='eight_head'>
                       $grpname
        
                    </div>
        
                </div>
                <div class='ten_content'>
                $rel_time
        
                </div>
            </div>
        </div>

        ");
     }

     exit();

}


?>

