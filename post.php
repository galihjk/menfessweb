<?php
include("init.php");
f("cek_login")();
// echo "<a href='index.php'>ok</a>";

if(!empty($_FILES["fileToUpload"]["name"])){
    $target_dir = "temp/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    $result = f("twitter.post_media")($_POST['text'],$target_file);
    /*
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
    */
}
else{
    $result = f("twitter.post_text")($_POST['text']);
}
echo "<pre>";
print_r($result);
die();
$msgid = $result->data->id;
$username = f("get_config")("username");
header("Location: https://twitter.com/$username/status/$msgid");
exit();
echo "<pre>";
print_r($_SESSION);
print_r($_POST);
print_r($result);
?>