<?php
function webview__home__stats($data){
    f("webview._component.statcard")([
        'color'=>'success',
        'title'=>'Quota Menfess Saat Ini',
        'icon'=>'fa-clock',
        'content'=>f("webview.home.stats.main_quota")($data),
    ]);
    f("webview._component.statcard")([
        'color'=>'danger',
        'title'=>'Quota Gratis Harian Anda',
        'icon'=>'fa-pencil',
        'content'=>f("webview.home.stats.msg_quota")($data),
    ]);
    f("webview._component.statcard")([
        'color'=>'warning',
        'title'=>'Koin Anda',
        'icon'=>'fa-coins',
        'content'=>f("webview.home.stats.coin")($data),
    ]);
    return true;
}