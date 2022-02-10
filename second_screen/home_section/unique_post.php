<script src="home_section/unique_post_interaction.js" type="text/javascript" defer></script>
 
 <?php
session_start();
require_once "../pdo.php";
$post_id = $_SESSION["post_id"];
$user_main = $_SESSION["account"];

$post_query = "SELECT 
pd.post_time as pt_time,
pd.content_type as pt_type,
pd.heading as heading,
pd.content as content,
pd.num_likes as likes,
pd.num_comment as comment,
pd.num_reblog as reblog,
us2.username as username,
us2.name as make_name,
us2.image_url as imageurl,
pd.post_id as pd_id
FROM 
post_data pd JOIN users us2 ON pd.origin_id = us2.user_id
WHERE (pd.post_id = :pu)";

$stmt_people = $pdo->prepare($post_query);

$stmt_people->execute(array(
    ":pu"=>$post_id,
));

$row=$stmt_people->fetch(PDO::FETCH_ASSOC);
if($row === FALSE){
    echo("error");
    // show some random files // nothing to show
    // echo("<script>console.log('checl1');</script>");
    exit();

}

else{
    $pt_time = $row["pt_time"];
    $pt_type = $row["pt_type"];
    $heading = htmlentities($row["heading"]);
    $content = htmlentities($row["content"]);
    $likes = $row["likes"];
    $comment = $row["comment"];
    $rebolg = $row["reblog"];
    $username = htmlentities($row["username"]);
    $make_name = htmlentities($row["make_name"]);
    $imageurl = $row["imageurl"];
    $pd_id = $row["pd_id"];
}

$stmt_people->closeCursor();

$vote_query = "SELECT pv.vote as vote
 FROM post_vote pv WHERE 
 pv.post_id = :pid AND pv.user_id = :ui";
 $stmt_vote = $pdo->prepare($vote_query);

 $stmt_vote->execute(array(
     ":pid"=>$post_id,
     ":ui"=>$user_main,
 ));
 
 $result=$stmt_vote->fetch(PDO::FETCH_ASSOC);
 if($result === FALSE){
    //  echo("error");
     // show some random files // nothing to show
     // echo("<script>console.log('checl1');</script>");
    //  exit();
    $post_vote = "NO";
 
 }
 else{
     $post_vote = $result["vote"];
 }

 $stmt_vote->closeCursor();

?>



<!-- <script>
             var url = "unique_post_interaction.js";
             $.getScript(url);
            
</script> -->


    <!-- <section class="five_post_section"> -->

    <?php

        // echo("<script>console.log('checl1');</script>");
      

        // $head = $row["heading"];         
         
            echo("<section class = 'post_new_page'>
            <section class = 'post_new_page_top'>
            <div class = 'unique_post_back' id = 'unique_post_back' onclick = 'go_back_from_post_page()'>
            <i class='fas fa-times'></i>
            </div>

            </section>

            <section class='main_body_post_comment'>
            
            <section class='four_post'>
        <div class='five_meta'>
            <div class='eight_poster_pic'>
                <img src=$imageurl>

            </div>
            <div class='nine_post_info'>
                <span class='name'>$make_name</span>
                <span class='username_time'>@$username <span class='dot'></span> $pt_time</span>

            </div>
            <div class='twelve_save_report'>
            <i class='fas fa-flag'></i>
            <i class='fas fa-bookmark'></i>
            </div>

        </div>
        <div class='six_body'>
            <div class='ten_heading'>
                $heading

            </div>
            ");

        if($pt_type == "T"){
            
            echo("<div class='eleven_content_text'>
            $content


            </div>");
        }
        elseif($pt_type == "I"){
            echo("<div class='eleven_content_image'>
            <img src=$content>

        </div>");
        
        }
        
        if($post_vote == "U"){
            
            echo("<div class='seven_repo'>
            <div>

            <i class='fas fa-thumbs-up unique_upvote' style = 'color:red;'></i>
            <span class='num_likes' style = 'color:red;'>$likes</span>
            <span class='post_data_id' style = 'display:none'>$post_id</span>
            <i class='fas fa-thumbs-down unique_downvote' ></i>
            
            </div>");
        }
        elseif($post_vote == "D"){
            echo("<div class='seven_repo'>
            <div>

            <i class='fas fa-thumbs-up unique_upvote' ></i>
            <span class='num_likes' style = 'color:blue;'>$likes</span>
            <span class='post_data_id' style = 'display:none'>$post_id</span>
            <i class='fas fa-thumbs-down unique_downvote' style = 'color:blue;' ></i>
            
            </div>");
        
        }

        elseif($post_vote == "NO"){
            echo("
        <div class='seven_repo'>
            <div>

            <i class='fas fa-thumbs-up unique_upvote' ></i>
            <span class='num_likes'>$likes</span>
            <span class='post_data_id' style = 'display:none'>$post_id</span>
            <i class='fas fa-thumbs-down unique_downvote' ></i>
            
            </div>");

        }
        

            echo("
        <div>
            <i class='fas fa-comment-alt'></i>
            <span class='num_comment' id='num_comment'>$comment</span>
            <span class='post_data_id' style = 'display:none'>$post_id</span>
        </div>
        <div>
            <i class='fas fa-retweet'></i>
            <span>$rebolg</span>
        </div>
        <div>
            <i class='fas fa-share-alt'></i>
        </div>


            

        </div>
      
       

        </section>
        <section class='unique_post_comment_section'>

        <div class='create_comment'>
        <div class='new_comment_editable' id='new_comment_editable' contentEditable>Enter your comment...</div>
        
        <div class = 'comment_post_button' id='comment_post_button'>
        <span class='post_data_id' style = 'display:none'>$post_id</span>
        <i class='fas fa-paper-plane'></i>
        </div>

        </div>





        <section class='old_post_comment' id='old_post_comment'>"


    
    
    
    
    
    
    );

        $comment_query = "SELECT 
        pc.comment_time as com_time,
        pc.content as com_con,
        us.username as com_name,
        us.image_url as com_image
        FROM
        post_comment pc JOIN post_data pd ON pc.post_id = pd.post_id
        JOIN users us ON us.user_id = pc.user_id
        WHERE pd.post_id = :pid
        ORDER BY pc.comment_time DESC;";

$stmt_comment = $pdo->prepare($comment_query);

$stmt_comment->execute(array(
    ":pid"=>$post_id,
));

$results=$stmt_comment->fetchAll(PDO::FETCH_ASSOC);
if(count($results) == 0){
    // show some random files // nothing to show
    // echo("<script>console.log('checl1');</script>");
    exit();

}


foreach($results as $comment_data){
    $com_time = $comment_data["com_time"];
    $com_con = $comment_data["com_con"];
    $com_name = $comment_data["com_name"];
    $com_image = $comment_data["com_image"];

    echo("
        

        <div class='post_comment'>
            <div class='comment_meta'>
            <img src=$com_image>
            <div>
            <span class='comment_username'>$com_name</span>
            <span class='comment_when'>$com_time</span>
            </div>
            </div>
            <div class='comment_data'>
            <span>$com_con</span>
            </div>
        </div>

 ");

}

echo("
</section>




        

</section>

</section>


</section>")






        

        
 ?>
 


