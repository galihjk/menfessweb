<?php
require_once "vendor/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;
define('CONSUMER_KEY', f("get_config")("CONSUMER_KEY"));
define('CONSUMER_SECRET', f("get_config")("CONSUMER_SECRET"));
define('ACCESS_TOKEN', f("get_config")("ACCESS_TOKEN"));
define('ACCESS_TOKEN_SECRET', f("get_config")("ACCESS_TOKEN_SECRET"));

function twitter__connect(){
    if(empty($GLOBALS["twitter_connection"])){
        print_r([CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET]);
        $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
        $GLOBALS["twitter_connection"] = $connection;
    }
    else{
        $connection = $GLOBALS["twitter_connection"];
    }
    return $connection;
}
    