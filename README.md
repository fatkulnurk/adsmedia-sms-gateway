# Adsmedia - SMS Gateway PHP Package

Kebutuhan untuk kirim sms menggunakan layanan dari Adsmedia.co.id

Semua respons sama seperti yang ada di dikumentasi

### Requirement
- PHP 8.1 or higher
- extension CURL

### Installation
run with composer

```text
composer require fatkulnurk/adsmedia-sms-gateway
```

### Usage

***Setting Configuration***

```php
Fatkulnurk\AdsmediaSmsGateway\Config\Config::getInstance()
    ->set(ConfigEnum::API_KEY->name, 'your key')
    ->set(ConfigEnum::URL_ENDPOINT->name, 'your private endpoint')
    ->set(ConfigEnum::CALLBACK_URL->name, 'your callback')
```

***Send Message***

Single message
```php
(new \Fatkulnurk\AdsmediaSmsGateway\SmsGateway())->sendMessage([
    ['number' => '08123456789', 'message' => 'Hello, World!']
]);
```

multiple message (max 1000 message)
```php
(new \Fatkulnurk\AdsmediaSmsGateway\SmsGateway())->sendMessage([
    ['number' => '08123456789', 'message' => 'Hello, World!'],
    ['number' => '08123456789', 'message' => 'Hello, World!'],
    ['number' => '08123456789', 'message' => 'Hello, World!'],
]);
```

***Get balance***
```php
(new \Fatkulnurk\AdsmediaSmsGateway\SmsGateway())->getBalance();
```

***get callback***
```php
(new \Fatkulnurk\AdsmediaSmsGateway\SmsGateway())->getCallback();
```
