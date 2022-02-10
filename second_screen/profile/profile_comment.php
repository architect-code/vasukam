<?php
session_start();
require_once "../pdo.php";
$user_main = $_SESSION["profile"];

$user_comment_query = "SELECT
pc.comment_time as comment_time,
pc.content as content,
gp.grpname as grpname,
pd.heading as heading
FROM
post_comment pc JOIN post_data pd ON pc.post_id = pd.post_id
JOIN grps gp ON pd.where_id = gp.grp_id
WHERE pc.user_id = :ui
ORDER BY pc.comment_time DESC";
     $stmt_user_comment = $pdo->prepare($user_comment_query);
     $stmt_user_comment->execute(array(
        ":ui"=>$user_main,

    ));

    $result=$stmt_user_comment->fetchAll(PDO::FETCH_ASSOC);
    if(count($result) == 0){
        echo("
        <section style='width: 100vw; height 30vw; display: flex;
        align-items: center; justify-content: center; margin-top: 2vw'>
        <div style='width: 92vw; border-radius: 2vw; background-color: #1e1e1e; color: white;
        display: flex; align-items: center; justify-content: center; padding: 2vw; font-size: 4vw;'>
        Greetings from Vasukam, no comments made
        </div>
        
        </section>
          
          ");
          exit();
    }

    else{
        foreach($result as $row) {

            $comment_time = $row["comment_time"];
            $content = htmlentities($row["content"]);
            $grpname = $row["grpname"];
            $heading = $row["heading"];           
            
                echo("
                <section class='four_comment'>
                
                <div class = 'four_comment_meta'>
                <span class='four_comment_where'>$grpname</span>
                <div class='ten_dot'></div>
                <div class='four_comment_when'>$comment_time</div>                  
                </div>
                <div class='four_comment_heading'>
                $heading
                </div>
                <div class= 'four_comment_content'>
                $content
                </div>
                </section>
                
                
                
                
                ");
            }
            exit();            

    }

?>


            
            
            
            
            