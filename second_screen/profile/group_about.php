<?php
session_start();
require_once "../pdo.php";
// $_SESSION["group_id"] = 1;
$group_main = $_SESSION["group_id"];
$user_main = $_SESSION["account"];
$user_about_query = "SELECT
gp.members as members,
us.image_url as image_url,
gp.grp_create_time as gp_time,
us.username as user_name,
gp.grpname as grpname
FROM grps gp JOIN users us ON gp.creator_id = us.user_id
WHERE gp.grp_id = :gi";
     $stmt_user_about = $pdo->prepare($user_about_query);
     $stmt_user_about->execute(array(
        ":gi"=>$group_main,

    ));

    $result=$stmt_user_about->fetch(PDO::FETCH_ASSOC);
    if($result===FALSE){
        echo("
        <section style='width: 100vw; height 30vw; display: flex;
        align-items: center; justify-content: center; margin-top: 2vw'>
        <div style='width: 92vw; border-radius: 2vw; background-color: #1e1e1e; color: white;
        display: flex; align-items: center; justify-content: center; padding: 2vw; font-size: 4vw;'>
        Greetings from Vasukam, Some error occured please try later
        </div>
        
        </section>
          
          ");
          exit();
    }

?>

<?php
    $num_mem = $result["members"];
    $image_url = $result["image_url"];
    $create_time = $result["gp_time"];
    $user_name = $result["user_name"];
    $grpname = $result["grpname"];

    echo("
    <div class='fifteen_about'>
    <div class='sixteen_context'> username </div>
    <div class='seventeen_value'>$grpname</div>
    </div>

    <div class='fifteen_about'>
    <div class='sixteen_context'>creation time</div>
    <div class='seventeen_value'>$create_time</div>
    </div>
    <div class='fifteen_about'>
    <div class='sixteen_context' >number of members</div>
    <div class='seventeen_value'>$num_mem</div>
    </div>
    <div class='fifteen_about'>
    <div class='sixteen_context'>creator</div>
    <div class='seventeen_value'>$user_name</div>
    </div>
    

    
    
    
    
    ")

   


  



?>
            
            
            
            
            