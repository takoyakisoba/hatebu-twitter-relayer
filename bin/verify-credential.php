<?php

require_once dirname(__DIR__).'/bootstrap.php';

$apiClient = $container['twitter_api.client'];

var_dump($apiClient->get('account/verify_credentials'));
