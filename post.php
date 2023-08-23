<?php
include("init.php");
f("cek_login")();
// echo "<a href='index.php'>ok</a>";
$result = f("twitter.post_text")($_POST['text']);
$msgid = $result->data->id;
$username = f("get_config")("username");
header("Location: https://twitter.com/$username/status/$msgid");
exit();
echo "<pre>";
print_r($_SESSION);
print_r($_POST);
print_r($result);
?>