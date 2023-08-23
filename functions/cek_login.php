<?php
function cek_login(){
    if(empty($_SESSION['access_token'])){
        $location = "login.php";
        if(!empty($_GET)){
            $location .= "?".http_build_query($_GET);
        }
        header("Location: $location");
        exit();
    }
    return true;
}
    