<?php
session_start();
require_once "../pdo.php";
$user_main = $_SESSION["profile"];

$user_about_query = "SELECT 
users.username as username, 
users.email as email,
users.user_join_time as join_time,
users.num_friend as num_friend, 
users.num_follower as num_follower, 
users.num_following as num_following,
users.image_url as image_url,
users.name as main_name,
users.num_post as num_post,
users.num_post_like as num_p_like,
users.num_comment_like as num_c_like,
users.num_comment as num_comment
FROM users
 WHERE users.user_id = :ui";
     $stmt_user_about = $pdo->prepare($user_about_query);
     $stmt_user_about->execute(array(
        ":ui"=>$user_main,

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
    $username = htmlentities($result["username"]);
    $join_time = $result["join_time"];
    $num_friend = $result["num_friend"];
    $num_follower = $result["num_follower"];
    $num_following = $result["num_following"];
    // $imageurl = $result["image_url"];
    $name = htmlentities($result["main_name"]);
    $email = htmlentities($result["email"]);
    $num_post = $result["num_post"];
    $num_p_like = $result["num_p_like"];
    $num_c_like = $result["num_c_like"];
    $num_comment = $result["num_comment"];

    echo("
    <div class='fifteen_about'>
    <div class='sixteen_context'> username </div>
    <div class='seventeen_value'>$username</div>
    </div>
    <div class='fifteen_about'>
    <div class='sixteen_context'>name</div>
    <div class='seventeen_value'>$name</div>
    </div>
    <div class='fifteen_about'>
    <div class='sixteen_context'>email</div>
    <div class='seventeen_value'>$email</div>
    </div>
    <div class='fifteen_about'>
    <div class='sixteen_context'>join time</div>
    <div class='seventeen_value'>$join_time</div>
    </div>
    <div class='fifteen_about'>
    <div class='sixteen_context' >number of friends</div>
    <div class='seventeen_value'>$num_friend</div>
    </div>
    <div class='fifteen_about'>
    <div class='sixteen_context'>number of followers</div>
    <div class='seventeen_value'>$num_follower</div>
    </div>
    <div class='fifteen_about'>
    <div class='sixteen_context'>number of following</div>
    <div class='seventeen_value'>$num_following</div>
    </div>
    <div class='fifteen_about'>
    <div class='sixteen_context'>number of posts</div>
    <div class='seventeen_value'>$num_post</div>
    </div>
    <div class='fifteen_about'>
    <div class='sixteen_context'>number of comments</div>
    <div class='seventeen_value'>$num_comment</div>
    </div>


    </div>

    
    
    
    
    ")

   


  



?>
            
            
            
            
            