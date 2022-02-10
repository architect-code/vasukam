<?php 
session_start();
require_once "../pdo.php";

$user_main = $_SESSION["account"];



        if(isset($_POST['post_save']) && isset($_SESSION["post_type"])){
            
            if(isset($_SESSION["post_group_id"])){
                // echo("post_tyoe and post group id done");

                $info = pathinfo($_FILES['file']['name']);
                $ext = $info['extension'];
                $target_dir = "../../upload_post/";
                $target_dir_loc = "../upload_post/";
                $filename = $user_main."_".date("YmdHms",time()).".".$ext;
                $file_loc = $target_dir.$filename;
                move_uploaded_file( $_FILES['file']['tmp_name'], $file_loc);
                $file_url = $target_dir_loc.$filename;
                // echo($_POST["heading"]);


                $save_post = "INSERT INTO post_data (origin_id, content_type, heading, content, num_likes, 
                num_comment, num_reblog, where_id, owner_id) VALUES (:oi, :ct, :hd, :co, :nl, :nc, :nr, :wi, :oi);
                UPDATE users SET num_post = num_post + 1 WHERE user_id = :oi;";
           

            $stmt1 = $pdo->prepare($save_post);
            $stmt1->execute(array(
                ":oi"=>$_SESSION["account"],
                ":ct"=>$_SESSION["post_type"],
                ":hd"=>$_POST["heading"],
                ":co"=>$file_url,
                ":nl"=>0,
                ":nc"=>0,
                ":nr"=>0,
                ":wi"=>$_SESSION["post_group_id"],
            ));

            unset($_SESSION["post_group_id"]);
            unset($_SESSION["post_type"]);

            echo "post_save";
            exit();

        }

        else{
            
            $info = pathinfo($_FILES['file']['name']);
            $ext = $info['extension'];
            $target_dir = "../../upload_post/";
            $target_dir_loc = "../upload_post/";
            $filename = $user_main."_".date("YmdHms",time()).".".$ext;
            $file_loc = $target_dir.$filename;
            move_uploaded_file( $_FILES['file']['tmp_name'], $file_loc);
            $file_url = $target_dir_loc.$filename;
            // echo($_POST["heading"]);


            $save_post = "INSERT INTO post_data (origin_id, content_type, heading, content, num_likes, 
            num_comment, num_reblog, where_id, owner_id) VALUES (:oi, :ct, :hd, :co, :nl, :nc, :nr, :wi, :oi);
            UPDATE users SET num_post = num_post + 1 WHERE user_id = :oi;";
       

        $stmt1 = $pdo->prepare($save_post);
        $stmt1->execute(array(
            ":oi"=>$_SESSION["account"],
            ":ct"=>$_SESSION["post_type"],
            ":hd"=>$_POST["heading"],
            ":co"=>$file_url,
            ":nl"=>0,
            ":nc"=>0,
            ":nr"=>0,
            ":wi"=>0,
        ));

        
        unset($_SESSION["post_type"]);

        echo "post_save";
        exit();
        }
     
   
    }

?>