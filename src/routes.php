<?php

Route::group(['namespace' => 'MichelMelo\EasyPay'], function () {
    Route::get('/easypay/session', 'EasyPayController@session');
    Route::get('/easypay/javascript', 'EasyPayController@javascript');
});
