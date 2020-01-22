<?php

namespace MichelMelo\EasyPay;

use Illuminate\Support\Facades\Facade;

class EasyPayFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'easypay';
    }
}
