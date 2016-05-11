<?php

namespace App\TwitterApi;

class StatusUpdater
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function update(string $message)
    {
        return $this->client->request(
            'post',
            'statuses/update',
            [
                'status' => $message
            ]
        );
    }
}
