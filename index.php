<?php
include("init.php");
$user = f("cek_login")();
/*
$connection = f("twitter.connect")("base");
$param = [
    'source_screen_name' => $_SESSION['access_token']['screen_name'],
    'target_screen_name' => f("get_config")("username"),
];

$following = $connection->get('friendships/show', $param);
echo "<pre>session\n";
print_r($_SESSION);
echo "connection\n";
print_r($connection);
echo "param\n";
print_r($param);
echo "following\n";
print_r($following);
die();
*/

$check_follow = true;

$userid = $user["id"];
$limit = f("get_config")("txt_quota_max",0)+f("get_config")("media_quota_max",0);
$q = "select * from posts where user_id='$userid' order by time desc limit $limit";
$my_posts = f("db.q")($q);

$base_quota_max = f("get_config")("base_quota_max",1);
$base_quota_seconds = f("get_config")("base_quota_seconds",1);
$q = "select count(1) cnt from posts where time > now() - interval $base_quota_seconds second";
$base_quota_used = f("db.q")($q)[0]['cnt'];

f("webview.home")([
    'check_follow'=>$check_follow,
    'my_posts'=>$my_posts,
    'base_quota_used'=>$base_quota_used,
    'base_quota_max'=>$base_quota_max,
    'base_username'=>f("get_config")("username"),
]);
f("db.disconnect")();
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";