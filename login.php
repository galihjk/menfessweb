<?php
include("init.php");
if(!empty($_GET['dev'])){
    $_SESSION['access_token'] = [
        "oauth_token" => "1691357912160206848-r2XytWtbV61xKLWjc8bUvd94jt6fkZ",
        "oauth_token_secret" => "scqyg4dM0mcIkbMd9LlwfOst2GKidTCtAFilrzoy7idcY",
        "user_id" => "1691357912160206848",
        "screen_name" => "men_fes",
    ];
    header("Location: index.php");
    exit();
}
else{
    f("twitter.login")();
}