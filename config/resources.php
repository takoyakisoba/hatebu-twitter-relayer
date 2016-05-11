<?php

$container['twitter_api.client'] = function ($c) {
    return new \App\TwitterApi\Client();
};
