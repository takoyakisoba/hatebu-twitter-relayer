<?php

namespace App\TwitterApi;

use Abraham\TwitterOAuth\TwitterOAuth as Client;

class Client
{
    const DEFAULT_RETRY_LIMIT = 3;

    private $client;

    public function __construct()
    {
        $this->client = new Client(
            getenv('TWITTER_API_KEY'),
            getenv('TWITTER_API_SECRET'),
            getenv('TWITTER_API_ACCESS_TOKEN'),
            getenv('TWITTER_API_ACCESS_TOKEN_SECRET')
        );
    }

    public function request(string $method, string $endpoint, array $options = [], int $retryLimit = self::DEFAULT_RETRY_LIMIT)
    {
        $client = $this->client;

        return RequestRetryHelper::request(function () use ($method, $client, $endpoint, $options) {
            return $client->{$method}($endpoint, $options);
        }, $retryLimit);
    }
}
