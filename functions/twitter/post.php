<?php
function twitter__post($endpoint, $data){
    $connection = f("twitter.connect")();
    print_r(['connection'=>$connection, 'endpoint'=>$endpoint, 'data'=>$data]);
    $result = $connection->post($endpoint, $data);
    if ($connection->getLastHttpCode() != 200) {
        echo 'error: ' . $result->errors[0]->message;
        file_put_contents("log/ErrorTwitterPost ".date("YmdHis").".txt", print_r($result->errors,true));
    }
    return $result;
}
    