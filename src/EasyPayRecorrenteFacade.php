<?php

namespace MichelMelo\EasyPay;

use Illuminate\Support\Facades\Facade;

class EasyPayRecorrenteFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'easypay_recorrente';
    }
}
