<?php
session_start();
require_once "../pdo.php";
$user_main = $_SESSION["profile"];

$user_post_query = "SELECT
gp.image_url as image_url,
gp.grpname as grpname,
pd.post_time as pd_time,
pd.content_type as pd_type,
pd.heading as pd_head,
pd.content as pd_content,
pd.num_likes as num_likes,
pd.num_comment as num_comment,
pd.num_reblog as num_reblog,
pd.post_id as post_id,
pv.vote as vote
FROM users us JOIN post_data pd ON us.user_id = pd.owner_id
JOIN grps gp ON pd.where_id = gp.grp_id 
LEFT JOIN post_vote pv ON pv.post_id = pd.post_id AND pv.user_id = us.user_id
WHERE us.user_id = :ui
ORDER BY pd.post_time DESC";
     $stmt_user_post = $pdo->prepare($user_post_query);
     $stmt_user_post->execute(array(
        ":ui"=>$user_main,
        // ":ff"=>"F",
        // ":ss"=>"S",
    ));

    $result=$stmt_user_post->fetchAll(PDO::FETCH_ASSOC);
    if(count($result) == 0){
        echo("
        <section style='width: 100vw; height 30vw; display: flex;
        align-items: center; justify-content: center; margin-top: 2vw'>
        <div style='width: 92vw; border-radius: 2vw; background-color: #1e1e1e; color: white;
        display: flex; align-items: center; justify-content: center; padding: 2vw; font-size: 4vw;'>
        Greetings from Vasukam, create some posts
        </div>
        
        </section>
          
          ");
          exit();
    }

    else{
        foreach($result as $row) {
  
            $image_url = "../".$row["image_url"];
            $grpname = $row["grpname"];
            $pd_time = $row["pd_time"];
            $pd_type = $row["pd_type"];
            $pd_head = htmlentities($row["pd_head"]);
            $pd_content =htmlentities($row["pd_content"]);
            $num_likes = $row["num_likes"];
            $num_comment = $row["num_comment"];
            $num_reblog = $row["num_reblog"];
            $pd_id = $row["post_id"];
            $pv_vote  = $row["vote"];

            
            if($pd_type == "I"){
                        
                
                $pd_content = "../".$pd_content;
    
            }
            
            
                echo("
                <section class='four_post'>
                            <div class='five_meta'>
                                <div class='six_where_when'>
                                    <div class='eight_where'>
                                    <img src=$image_url>
                                        <span>$grpname</span>
                                    </div>
                                    
                                    <div class='ten_dot'>
                                   
                                </div>
                                    
                                    <div class='nine_when'> 
                                        $pd_time
            
                                    </div>
            
                                </div>
                                <div class='seven_option'>
                                    <i class='fas fa-ellipsis-v'></i>
            
                                </div>
                            </div>
                            <div class='six_body'>
                            <div class='meta_post_id' style = 'display:none;'>$pd_id</div>
                                <div class='ten_heading'>
                                    $pd_head
                    
                                </div>
                                ");
                    
                            if($pd_type == "T"){
                                
                                echo("<div class='eleven_content_text ninteen_content'>
                                $pd_content
                    
                    
                                </div>");
                            }
                            elseif($pd_type == "I"){
                                echo("<div class='eleven_content_image ninteen_content'>
                                <img src=$pd_content>
                    
                            </div>");
                            
                            }
                            
                            if($pv_vote == "U"){
                                
                                echo("<div class='seven_repo'>
                                <div>
                    
                                <i class='fas fa-thumbs-up upvote' style = 'color:red;' ></i>
                                <span class='num_likes' style = 'color:red;'>$num_likes</span>
                                <span class='post_data_id' style = 'display:none'>$pd_id</span>
                                <i class='fas fa-thumbs-down downvote' ></i>
                                
                                </div>");
                            }
                            elseif($pv_vote == "D"){
                                echo("<div class='seven_repo'>
                                <div>
                    
                                <i class='fas fa-thumbs-up upvote' ></i>
                                <span class='num_likes' style = 'color:blue;'>$num_likes</span>
                                <span class='post_data_id' style = 'display:none'>$pd_id</span>
                                <i class='fas fa-thumbs-down downvote' style = 'color:blue;' ></i>
                                
                                </div>");
                            
                            }
                    
                            elseif(is_null($pv_vote)){
                                echo("
                            <div class='seven_repo'>
                                <div>
                    
                                <i class='fas fa-thumbs-up upvote' ></i>
                                <span class='num_likes'>$num_likes</span>
                                <span class='post_data_id' style = 'display:none'>$pd_id</span>
                                <i class='fas fa-thumbs-down downvote' ></i>
                                
                                </div>");
                    
                            }
                            
                    
                                echo("
                            <div class='nine_comment'>
                                <i class='fas fa-comment-alt'></i>
                                <span class='load_main_comment'>$num_comment</span>
                            </div>
                            <div>
                                <i class='fas fa-retweet'></i>
                                <span>$num_reblog</span>
                            </div>
                            <div>
                                <i class='fas fa-share-alt'></i>
                            </div>
                                
                    
                            </div>
                    
                        </section>");
                        
                    
            }
            exit();            

    }

?>


            
            
            
            
            