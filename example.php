<?php

require __DIR__ . '/vendor/autoload.php';

use Fatkulnurk\AdsmediaSmsGateway\Config\Config;

// example for set config
Config::getInstance()
    ->set('key', 'value');

// example for get config
echo Config::getInstance()
    ->get('key');


// send message

// single message
(new \Fatkulnurk\AdsmediaSmsGateway\SmsGateway())->sendMessage([
    ['number' => '08123456789', 'message' => 'Hello, World!']
]);

// multiple message (max 1000 message)
(new \Fatkulnurk\AdsmediaSmsGateway\SmsGateway())->sendMessage([
    ['number' => '08123456789', 'message' => 'Hello, World!'],
    ['number' => '08123456789', 'message' => 'Hello, World!'],
    ['number' => '08123456789', 'message' => 'Hello, World!'],
]);

// get balance
(new \Fatkulnurk\AdsmediaSmsGateway\SmsGateway())->getBalance();

// get callback
(new \Fatkulnurk\AdsmediaSmsGateway\SmsGateway())->getCallback();