<?php
function twitter__login(){
    $consumer_key = f("get_config")("CONSUMER_KEY");
    $consumer_secret = f("get_config")("CONSUMER_SECRET");
    $callback = f("get_config")("LOGIN_URL");



    if (isset($_SESSION['oauth_token'])) {
        $oauth_token = $_SESSION['oauth_token'];
        unset($_SESSION['oauth_token']);

        $connection = new Abraham\TwitterOAuth\TwitterOAuth($consumer_key, $consumer_secret);
        
        $params = [
            "oauth_verifier" => $_GET['oauth_verifier'],
            'oauth_token' => $_GET['oauth_token']
        ];

        $access_token = $connection->oauth('oauth/access_token', $params);

        $connection = new Abraham\TwitterOAuth\TwitterOAuth($consumer_key, $consumer_secret, $access_token['oauth_token'], $access_token['oauth_token_secret']);

        $content = $connection->get('account/verify_credentials');
        
        print_r($content);

    } else {
        
        $connection = new Abraham\TwitterOAuth\TwitterOAuth($consumer_key, $consumer_secret);

        $temporary_credentials = $connection->oauth('oauth/request_token', ["oauth_callback" => $callback]);

        $_SESSION['oauth_token'] = $temporary_credentials['oauth_token'];
        $_SESSION['oauth_token_secret'] = $temporary_credentials['oauth_token_secret'];

        $url = $connection->url('oauth/authenticate', array('oauth_token' => $temporary_credentials['oauth_token']));

        echo "<a href='$url'>$url</a>";
        // REDIRECTING TO THE URL
        // header('Location: ' . $url);
    }

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
}
