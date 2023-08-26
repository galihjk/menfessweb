<?php
function webview__home__stats__msg_quota($data){
    ob_start();
    ?>
    <pre>asdasdsadsa<?php print_r($data)?></pre>
    <?php
    return ob_get_clean();
}