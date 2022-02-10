<!-- <script>
        var url2 = "post_interaction.js";
        $.getScript(url2);
</script>
  -->
  <script> console.log("people");</script>

<script src="home_section/post_interaction_local.js" type="text/javascript" defer></script>
<script src="home_section/post_marketplace.js" type="text/javascript" defer></script>

 <?php
session_start();
require_once "../pdo.php";

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
    pv.vote as vote,
    pd.post_id as pd_id,
    pd.owner_id as pd_owner_id,
    us3.username as owner_username,
    ap.ask_price as ask_price,
    bp.bid_price_value as bid_value
    FROM 
    users us1 JOIN user_user_rel uur ON us1.user_id = uur.user1_id 
    JOIN users us3 ON us3.user_id = uur.user2_id 
    JOIN post_data pd ON pd.owner_id = us3.user_id
    JOIN users us2 ON us2.user_id = pd.origin_id
    LEFT JOIN ask_price ap ON ap.post_id = pd.post_id
    LEFT JOIN post_vote pv ON pv.post_id = pd.post_id AND pv.user_id = us1.user_id
    LEFT JOIN bid_price bp ON bp.post_id = pd.post_id AND bp.bidder_id = us1.user_id
    WHERE (us1.user_id = :um) AND (uur.relation = 'F' OR uur.relation = 'S' OR uur.relation = 'A' OR uur.relation = 'C')
    ORDER BY pd.post_time DESC";

$stmt_people = $pdo->prepare($post_query);

$stmt_people->execute(array(
    ":um"=>$user_main,
));

$result=$stmt_people->fetchAll(PDO::FETCH_ASSOC);
if(count($result)==0){
    echo("
    <section style='width: 100vw; height 30vw; display: flex;
    align-items: center; justify-content: center; margin-top: 2vw'>
    <div style='width: 92vw; border-radius: 2vw; background-color: #1e1e1e; color: white;
    display: flex; align-items: center; justify-content: center; padding: 2vw; font-size: 4vw;'>
    Greetings from Vasukam, to see post here follow someone or make new friends
    </div>
    
    </section>
      
      ");

      exit();

}

else{
    
    
     foreach($result as $row) {
        // echo("<script>console.log('checl1');</script>");
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
        $post_vote = $row["vote"];
        $post_id_str = (string)$pd_id;
        $owner_username = $row["owner_username"];
        $ask_price = $row["ask_price"];
        $pd_owner_id = $row["pd_owner_id"];
        $bid_value = $row["bid_value"];

       
         
            echo("<section class='four_post' id=$post_id_str>
            
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
        <div class='meta_post_id' style = 'display:none;'>$pd_id</div>
            <div class='ten_heading'>
                $heading

            </div>
            ");

        if($pt_type == "T"){
            
            echo("<div class='eleven_content_text ninteen_content'>
            $content


            </div>");
        }
        elseif($pt_type == "I"){
            echo("<div class='eleven_content_image ninteen_content'>
            <img src=$content>

        </div>");
        
        }
        
        if($post_vote == "U"){
            
            echo("<div class='seven_repo'>
            <div>

            <i class='fas fa-thumbs-up upvote' style = 'color:red;' ></i>
            <span class='num_likes' style = 'color:red;'>$likes</span>
            <span class='post_data_id' style = 'display:none'>$pd_id</span>
            <i class='fas fa-thumbs-down downvote' ></i>
            
            </div>");
        }
        elseif($post_vote == "D"){
            echo("<div class='seven_repo'>
            <div>

            <i class='fas fa-thumbs-up upvote' ></i>
            <span class='num_likes' style = 'color:blue;'>$likes</span>
            <span class='post_data_id' style = 'display:none'>$pd_id</span>
            <i class='fas fa-thumbs-down downvote' style = 'color:blue;' ></i>
            
            </div>");
        
        }

        elseif(is_null($post_vote)){
            echo("
        <div class='seven_repo'>
            <div>

            <i class='fas fa-thumbs-up upvote' ></i>
            <span class='num_likes'>$likes</span>
            <span class='post_data_id' style = 'display:none'>$pd_id</span>
            <i class='fas fa-thumbs-down downvote' ></i>
            
            </div>");

        }
        

            echo("
        <div class='nine_comment'>
            <i class='fas fa-comment-alt'></i>
            <span class='load_main_comment'>$comment</span>
        </div>
        <div>
            <i class='fas fa-retweet'></i>
            <span>$rebolg</span>
        </div>
        <div>
            <i class='fas fa-share-alt'></i>
        </div>
            

        </div>");

        if($user_main == $pd_owner_id){
            if(is_null($ask_price)){
            echo("

            <div class = 'ten_post_market'>
            <div class = 'eleven_current_owner'>
            owned by you
            </div>
            <div class = 'twelve_ask_price' style = 'visibility:hidden'>
            </div>
            <div class = 'thirteen_bid_price'>
            <span  onclick = 'sell_post(this);'>sell this post</span>
            <span class = 'post_id' style = 'display: none'>$pd_id</span>
            </div>
            </div>
            
            ");
            }

            else{
                echo("

            <div class = 'ten_post_market'>
            <div class = 'eleven_current_owner'>
            owned by you
            </div>
            <div class = 'twelve_ask_price'>
            <span>price: $ask_price <i class='fab fa-vuejs'></i></span>
            </div>
            <div class = 'thirteen_bid_price'>
            <span onclick = 'remove_sell_post(this);'>remove price</span>
            <span class = 'post_id' style = 'display: none'>$pd_id</span>
            </div>
            </div>
            
            ");

            }



        }

        else{
        if(is_null($ask_price)){
            if(is_null($bid_value)){
            echo("

            <div class = 'ten_post_market'>
            <div class = 'eleven_current_owner'>
            owned by $owner_username
            </div>
            <div class = 'twelve_ask_price' style = 'visibility:hidden'>
            <span>buy: 1000 <i class='fab fa-vuejs'></i></span>
            </div>
            <div class = 'thirteen_bid_price'>
            <span onclick = 'make_offer_post(this);'>make offer</span>
            <span class = 'owner_id' style = 'display: none'>$pd_owner_id</span>
            <span class = 'post_id' style = 'display: none'>$pd_id</span>
            </div>
            </div>
            
            ");

        }

        else{
            echo("

            <div class = 'ten_post_market'>
            <div class = 'eleven_current_owner'>
            owned by $owner_username
            </div>
            <div class = 'twelve_ask_price' style = 'visibility:hidden'>
            <span>buy: 1000 <i class='fab fa-vuejs'></i></span>
            </div>
            <div class = 'thirteen_bid_price'>
            <span onclick = 'change_offer_post(this);'>offered: $bid_value <i class='fab fa-vuejs'></i></span>
            <span class = 'owner_id' style = 'display: none'>$pd_owner_id</span>
            <span class = 'post_id' style = 'display: none'>$pd_id</span>
            </div>
            </div>
            
            ");

        }

        }

        else{
            if(is_null($bid_value)){
            echo("

            <div class = 'ten_post_market'>
            <div class = 'eleven_current_owner'>
            owned by $owner_username
            </div>
            <div class = 'twelve_ask_price'>
            <span onclick = 'buy_post(this);'>buy: $ask_price <i class='fab fa-vuejs'></i></span>
            <span class = 'ask_price' style = 'display: none'>$ask_price</span>
            <span class = 'owner_id' style = 'display: none'>$pd_owner_id</span>
            <span class = 'post_id' style = 'display: none'>$pd_id</span>
            </div>
            <div class = 'thirteen_bid_price'>
            <span onclick = 'make_offer_post(this);'>make offer</span>
            <span class = 'owner_id' style = 'display: none'>$pd_owner_id</span>
            <span class = 'post_id' style = 'display: none'>$pd_id</span>
            </div>
            </div>
            
            ");

        }
        else{
            echo("

            <div class = 'ten_post_market'>
            <div class = 'eleven_current_owner'>
            owned by $owner_username
            </div>
            <div class = 'twelve_ask_price'>
            <span onclick = 'buy_post(this);'>buy: $ask_price <i class='fab fa-vuejs'></i></span>
            <span class = 'ask_price' style = 'display: none'>$ask_price</span>
            <span class = 'owner_id' style = 'display: none'>$pd_owner_id</span>
            <span class = 'post_id' style = 'display: none'>$pd_id</span>
            </div>
            <div class = 'thirteen_bid_price'>
            <span onclick = 'change_offer_post(this);'>offered: $bid_value <i class='fab fa-vuejs'></i></span>
            <span class = 'owner_id' style = 'display: none'>$pd_owner_id</span>
            <span class = 'post_id' style = 'display: none'>$pd_id</span>
            </div>
            </div>
            
            ");

        }
    }

    }
       


        echo("

    </section>");
    


}

exit();



}



?>







        



