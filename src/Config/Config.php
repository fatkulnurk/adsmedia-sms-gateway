<?php

namespace Fatkulnurk\AdsmediaSmsGateway\Config;

class Config
{
    private static null|self $instance = null;
    private array $config = [];

    private function __construct()
    {
        $this->config = [
            \Fatkulnurk\AdsmediaSmsGateway\Enums\Config::API_KEY->name => null,
            \Fatkulnurk\AdsmediaSmsGateway\Enums\Config::URL_ENDPOINT->name => null,
            \Fatkulnurk\AdsmediaSmsGateway\Enums\Config::CALLBACK_URL->name => null,
        ];
    }

    private function __clone()
    {
    }

    /**
     * Returns a singleton instance of the class.
     *
     * @return Config|null
     */
    public static function getInstance(): self|null
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Sets a value in the configuration array.
     *
     * @param string $key The key to set.
     * @param mixed $value The value to set.
     * @return $this The current object.
     */
    public function set(string $key, mixed $value): static
    {
        $this->config[$key] = $value;

        return $this;
    }

    /**
     * Retrieves the value associated with the given key from the configuration array.
     *
     * @param string $key The key to retrieve the value for.
     * @return mixed|null The value associated with the given key, or null if the key does not exist.
     */
    public function get(string $key): mixed
    {
        return $this->config[$key] ?? null;
    }
}