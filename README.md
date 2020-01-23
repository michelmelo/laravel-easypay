
<p align="center">
<a href="https://packagist.org/packages/michelmelo/laravel-easypay"><img src="https://poser.pugx.org/michelmelo/laravel-easypay/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/michelmelo/laravel-easypay"><img src="https://poser.pugx.org/michelmelo/laravel-easypay/d/monthly" alt="Monthly Downloads"></a>
<a href="https://packagist.org/packages/michelmelo/laravel-easypay"><img src="https://poser.pugx.org/michelmelo/laravel-easypay/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://laravel.com"><img src="https://img.shields.io/badge/laravel-5.*-ff69b4.svg?style=flat-square" alt="License"></a>
</p>

Visite a [Wiki](https://github.com/michelmelo/laravel-easypay/wiki) para verificar os detalhes de como utilizar esta Package.

Qualquer problema, dúvida ou sugestão sinta-se livre para abrir uma issue ou enviar um PR.

```php
use EasyPay; //Utilize a Facade

try {
    $pagseguro = EasyPay::setReference('2')
    ->setSenderInfo([
       'senderName' => 'Nome Completo', //Deve conter nome e sobrenome
       'senderPhone' => '(32) 1324-1421', //Código de área enviado junto com o telefone
       'senderEmail' => 'email@email.com',
       'senderHash' => 'Hash gerado pelo javascript',
       'senderCNPJ' => '98.966.488/0001-00' //Ou CPF se for Pessoa Física
    ])
    ->setShippingAddress([
       'shippingAddressStreet' => 'Rua/Avenida',
       'shippingAddressNumber' => 'Número',
       'shippingAddressDistrict' => 'Bairro',
       'shippingAddressPostalCode' => '12345-678',
       'shippingAddressCity' => 'Cidade',
       'shippingAddressState' => 'UF'
     ])
     ->setItems([
      [
        'itemId' => 'ID',
        'itemDescription' => 'Nome do Item',
        'itemAmount' => 12.14, //Valor unitário
        'itemQuantity' => '2', // Quantidade de itens
      ],
      [
        'itemId' => 'ID 2',
        'itemDescription' => 'Nome do Item 2',
        'itemAmount' => 12.14,
        'itemQuantity' => '2',
      ]
    ])
    ->send([
      'paymentMethod' => 'boleto'
    ]);
}
catch(\MichelMelo\EasyPay\EasyPayException $e) {
    $e->getCode(); //codigo do erro
    $e->getMessage(); //mensagem do erro
}
```

#### Créditos


