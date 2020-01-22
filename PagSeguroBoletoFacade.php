<?php

namespace MichelMelo\EasyPay;

use Illuminate\Support\Facades\Facade;

class EasyPayBoletoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'EasyPay_boleto';
    }
}
