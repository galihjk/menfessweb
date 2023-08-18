<?php
include("init.php");
echo "<h1>MenfessWeb</h1>";
echo "<p>Hello</p>";
echo "<pre> ini hasilnya:\n";
$update_status = f("twitter.update_status")("This is a test tweet. ".date("Y-m-d H:i:s"));
print_r($update_status);
echo "</pre>";