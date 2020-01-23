<?php

namespace MichelMelo\EasyPay;

class EasyPayController
{
    /** @var \Artistas\EasyPay\EasyPayClient */
    private $easypay;

    /**
     * Instancia as dependências.
     */
    public function __construct()
    {
        $this->easypay = app('easypay');
    }

    /**
     * Gera um token de sessão para realizar transações.
     *
     * @return string
     */
    public function session()
    {
        return $this->easypay->startSession();
    }

    /**
     * Inclui o arquivo javascript necessário para gerar o token no browser.
     *
     * @return \Illuminate\Http\Response
     */
    public function javascript()
    {
        $scriptContent = file_get_contents($this->easypay->getUrl()['javascript']);

        return response()->make($scriptContent, '200')
            ->header('Content-Type', 'text/javascript');
    }
}
