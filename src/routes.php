<?php

Route::group(['namespace' => 'MichelMelo\PagSeguro'], function () {
    Route::get('/pagseguro/session', 'PagSeguroController@session');
    Route::get('/pagseguro/javascript', 'PagSeguroController@javascript');
});
