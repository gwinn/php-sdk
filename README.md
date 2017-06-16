# eComlogic API PHP client

PHP-client for [eComlogic API](http://www.ecomlogic.com/docs/Developers/ApiVersion5).

## Requirements

* PHP 5.4 and above
* PHP's cURL support

## Install

1) Get [composer](https://getcomposer.org/download/)

2) Run into your project directory:
```bash
composer require ecomlogic-com/php-sdk 1.* --no-dev
```

If you have not used `composer` before, include autoloader into your project.
```php
require 'path/to/vendor/autoload.php';
```

## Usage

### Get order
```php
$client = new \Ecomlogic\ApiClient(
    'https://demo.ecomlogic.com',
    'T9DMPvuNt7FQJMszHUdG8Fkt6xHsqngH'
);


try {
    $response = $client->ordersGet('M-2342');
} catch (\Ecomlogic\Exception\CurlException $e) {
    echo "Connection error: " . $e->getMessage();
}

if ($response->isSuccessful()) {
    echo $response->order['totalSumm'];
    // or $response['order']['totalSumm'];
    // or
    //    $order = $response->getOrder();
    //    $order['totalSumm'];
} else {
    echo sprintf(
        "Error: [HTTP-code %s] %s",
        $response->getStatusCode(),
        $response->getErrorMsg()
    );

    // error details
    if (isset($response['errors'])) {
        print_r($response['errors']);
    }
}
```

### Create order
```php

$client = new \Ecomlogic\ApiClient(
    'https://demo.ecomlogic.com',
    'T9DMPvuNt7FQJMszHUdG8Fkt6xHsqngH'
);

try {
    $response = $client->ordersCreate(array(
        'externalId' => 'some-shop-order-id',
        'firstName' => 'John',
        'lastName' => 'Doe',
        'items' => array(
            //...
        ),
        'delivery' => array(
            'code' => 'dhl',
        )
    ));
} catch (\Ecomlogic\Exception\CurlException $e) {
    echo "Connection error: " . $e->getMessage();
}

if ($response->isSuccessful() && 201 === $response->getStatusCode()) {
    echo 'Order successfully created. Order ID into eComlogic = ' . $response->id;
        // or $response['id'];
        // or $response->getId();
} else {
    echo sprintf(
        "Error: [HTTP-code %s] %s",
        $response->getStatusCode(),
        $response->getErrorMsg()
    );

    // error details
    if (isset($response['errors'])) {
        print_r($response['errors']);
    }
}
```
