<?php
include("init.php");
f("cek_login")();
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
$check_follow = true;
f("webview.home")([
    'check_follow'=>$check_follow,
]);
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";