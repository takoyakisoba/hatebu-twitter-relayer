<?php

namespace App\TwitterApi;

use Abraham\TwitterOAuth\TwitterOAuth as ApiClient;

class Client
{
    const DEFAULT_RETRY_LIMIT = 3;

    private $apiClient;

    public function __construct()
    {
        $this->apiClient = new ApiClient(
            getenv('TWITTER_API_KEY'),
            getenv('TWITTER_API_SECRET'),
            getenv('TWITTER_API_ACCESS_TOKEN'),
            getenv('TWITTER_API_ACCESS_TOKEN_SECRET')
        );
    }

    public function request(string $method, string $endpoint, array $options = [], int $retryLimit = self::DEFAULT_RETRY_LIMIT)
    {
        $apiClient = $this->apiClient;

        return RequestRetryHelper::request(function () use ($method, $apiClient, $endpoint, $options) {
            return $apiClient->{$method}($endpoint, $options);
        }, $retryLimit);
    }
}
