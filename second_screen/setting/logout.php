<?php
session_start();

if(isset($_POST['logout_check'])){
unset($_COOKIE['account']);
setcookie('account', '', 1, '/'); 
unset($_COOKIE['success']);
setcookie('success', '', 1, '/'); 
unset($_SESSION["success"]);
unset($_SESSION["account"]);
unset($_SESSION["email"]);
unset($_SESSION["username"]);
unset($_SESSION["password"]);
session_destroy();


}

?>