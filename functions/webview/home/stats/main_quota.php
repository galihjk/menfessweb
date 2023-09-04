<?php
function webview__home__stats__main_quota($data){
    ob_start();
    $start = time()-24*60*60;
    // $end = time();
    ?>
    <div class="row no-gutters align-items-center">
        <div class="col-auto">
            <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">8/10</div>
        </div>
        <div class="col">
            <div class="progress progress-sm mr-2">
                <div class="progress-bar bg-info" role="progressbar"
                    style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                    aria-valuemax="100"></div>
            </div>
        </div>
    </div>
    <div class="row no-gutters align-items-center">
        <div class="col">
            <div class=""><?=date("H:i:s (d/m/Y)")?></div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}