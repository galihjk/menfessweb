<?php
function twitter__login(){
    

    if(empty($_SESSION['user'])){
        $connection = f("twitter.connect")();
        
        $request_token = $connection->getRequestToken(f("get_config")("LOGIN_URL")); 
        $_SESSION['token'] = $request_token['oauth_token']; 
        $_SESSION['token_secret'] = $request_token['oauth_token_secret']; 

        if($connection->http_code == '200'){ 
            $authUrl = $connection->getAuthorizeURL($request_token['oauth_token']); 
            $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'">LOGIN</a>'; 
        }else{ 
            $output = '<h3 style="color:red">Error connecting to Twitter! Try again later!</h3>'; 
        }

        echo $output;
    }
    else{
        $connection = f("twitter.connect")($_SESSION['token'],$_SESSION['token_secret']);
        $access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']); 
        $_SESSION['access_token'] = $access_token;
        $_SESSION['user'] = $connection->get('account/verify_credentials');
    }
    /*

    if(isset($_REQUEST['oauth_token']) && $_SESSION['token'] !== $_REQUEST['oauth_token']){ 
        //Remove token from session 
        unset($_SESSION['token']); 
        unset($_SESSION['token_secret']); 
    }
    $connection = f("twitter.connect")();
    $access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']); 
    if($connection->http_code == '200'){ 
        // Storing access token data into sessio
        $_SESSION['access_token'] = $access_token;
        $_SESSION['user'] = $connection->get('account/verify_credentials');
    }
    */

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
}
