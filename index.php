<?php
include("init.php");
echo "<h1>MenfessWeb</h1>";
echo "<p>Hello</p>";
echo "<pre> ini hasilnya:\n";
$response = f("twitter.get")('users', ['ids' => 12]);
echo "get response:\n";
print_r($response);
// $update_status = f("twitter.update_status")("This is a test tweet. ".date("Y-m-d H:i:s"));
// print_r($update_status);
echo "</pre>";
echo "<a href='login.php'>Login</a>";