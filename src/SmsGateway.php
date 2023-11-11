<?php

namespace Fatkulnurk\AdsmediaSmsGateway;

use Fatkulnurk\AdsmediaSmsGateway\Config\Config;
use \Fatkulnurk\AdsmediaSmsGateway\Enums\Config as ConfigEnum;

class SmsGateway
{
    private null|Config $config;

    public function __construct()
    {
        $this->config = Config::getInstance();
    }

    private function post(string $url, array $data)
    {
        $payloadString = json_encode($data);
        $curlHandle = curl_init($url);
        curl_setopt($curlHandle, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $payloadString);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandle, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($payloadString))
        );
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 5);
        curl_setopt($curlHandle, CURLOPT_CONNECTTIMEOUT, 5);
        $responjson = curl_exec($curlHandle);
        curl_close($curlHandle);

        return $responjson;
    }


    public function sendMessage(array $data, string $path = '/sms/api_sms_masking_send_json.php'): mixed
    {
        if (count($data) > 1000) {
            throw new \Exception('Data packet cannot be more than 1000.');
        }

        return $this->post(
            url: $this->config->get(ConfigEnum::URL_ENDPOINT->name) . $path,
            data: [
                'apikey' => $this->config->get(ConfigEnum::API_KEY->name),
                'callbackurl' => $this->config->get(ConfigEnum::CALLBACK_URL->name),
                'datapacket' => $data
            ]
        );
    }

    public function getBalance(string $path = '/sms/api_sms_masking_balance_json.php')
    {
        return $this->post(
            url: $this->config->get(ConfigEnum::URL_ENDPOINT->name) . $path,
            data: [
                'apikey' => $this->config->get(ConfigEnum::API_KEY->name)
            ]
        );
    }

    public function getCallback()
    {
       return json_decode(file_get_contents('php://input'),TRUE);
    }
}