<?php 
session_start();
require_once "../pdo.php";


        if(isset($_POST['group_check'])){
            unset($_SESSION["post_group_id"]);
            $_SESSION["post_group_id"]=(int)$_POST["group_id"];
            echo "group_set";
            exit();
            
        }

        if(isset($_POST['post_text_check'])){
            unset($_SESSION["post_type"]);
            $_SESSION["post_type"]=$_POST["post_type"];
            echo "post_set";
            exit();
            
        }

        elseif(isset($_POST['post_image_check'])){
            unset($_SESSION["post_type"]);
            $_SESSION["post_type"]=$_POST["post_type"];
            echo "post_set";
            exit();
            
        }

        elseif(isset($_POST['post_video_check'])){
            unset($_SESSION["post_type"]);
            $_SESSION["post_type"]=$_POST["post_type"];
            echo "post_set";
            exit();
            
        }

        
