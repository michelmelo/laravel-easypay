<?php

namespace MichelMelo\EasyPay;

use Illuminate\Validation\Factory as Validator;
use Psr\Log\LoggerInterface as Log;

class EasyPayConfig
{
    /**
     * Log instance.
     *
     * @var object
     */
    protected $log;

    /**
     * Validator instance.
     *
     * @var object
     */
    protected $validator;

    /**
     * Modo sandbox.
     *
     * @var bool
     */
    protected $sandbox;

    /**
     * Token da conta EasyPay.
     *
     * @var string
     */
    protected $token;

    /**
     * Email da conta EasyPay.
     *
     * @var string
     */
    protected $email;

    /**
     * Url de Notificação para o EasyPay.
     *
     * @var string
     */
    protected $notificationURL;

    /**
     * Armazena as url's para conexão com o EasyPay.
     *
     * @var array
     */
    protected $url = [];

    /**
     * @param $log
     * @param $validator
     */
    public function __construct(Log $log, Validator $validator)
    {
        $this->log = $log;
        $this->validator = $validator;
        $this->setEnvironment();
        $this->setUrl();
    }

    /**
     * Define o ambiente de trabalho.
     */
    private function setEnvironment()
    {
        $this->sandbox = config('EasyPay.sandbox', env('EasyPay_SANDBOX', true));
        $this->email = config('EasyPay.email', env('EasyPay_EMAIL', ''));
        $this->token = config('EasyPay.token', env('EasyPay_TOKEN', ''));
        $this->notificationURL = config('EasyPay.notificationURL', env('EasyPay_NOTIFICATION', ''));
    }

    /**
     * Define as Urls que serão utilizadas de acordo com o ambiente.
     */
    private function setUrl()
    {
        $sandbox = $this->sandbox ? 'sandbox.' : '';

        $url = [
            'preApprovalRequest'            => 'https://ws.'.$sandbox.'EasyPay.uol.com.br/v2/pre-approvals/request',
            'preApproval'                   => 'https://ws.'.$sandbox.'EasyPay.uol.com.br/pre-approvals',
            'preApprovalCancel'             => 'https://ws.'.$sandbox.'EasyPay.uol.com.br/v2/pre-approvals/cancel/',
            'cancelTransaction'             => 'https://ws.'.$sandbox.'EasyPay.uol.com.br/v2/transactions/cancels',
            'preApprovalNotifications'      => 'https://ws.'.$sandbox.'EasyPay.uol.com.br/v2/pre-approvals/notifications/',
            'session'                       => 'https://ws.'.$sandbox.'EasyPay.uol.com.br/v2/sessions',
            'transactions'                  => 'https://ws.'.$sandbox.'EasyPay.uol.com.br/v2/transactions',
            'notifications'                 => 'https://ws.'.$sandbox.'EasyPay.uol.com.br/v3/transactions/notifications/',
            'javascript'                    => 'https://stc.'.$sandbox.'EasyPay.uol.com.br/EasyPay/api/v2/checkout/EasyPay.directpayment.js',
            'boletos'                       => 'https://ws.EasyPay.uol.com.br/recurring-payment/boletos',
        ];

        $this->url = $url;
    }

    /**
     * Retorna o array de url's.
     */
    public function getUrl()
    {
        return $this->url;
    }
}
