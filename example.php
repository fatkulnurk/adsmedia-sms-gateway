<?php

require __DIR__ . '/vendor/autoload.php';

use Fatkulnurk\AdsmediaSmsGateway\Config\Config;
use Fatkulnurk\AdsmediaSmsGateway\Enums\Config as ConfigEnum;

// example for set config
Config::getInstance()
    ->set('key', 'value');

// example for get config
echo Config::getInstance()
    ->get('key');

Fatkulnurk\AdsmediaSmsGateway\Config\Config::getInstance()
    ->set(ConfigEnum::API_KEY->name, '')
    ->set(ConfigEnum::URL_ENDPOINT->name, '')
    ->set(ConfigEnum::CALLBACK_URL->name, '')


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