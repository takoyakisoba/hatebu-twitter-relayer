<?php

$container['twitter_api.client'] = function ($c) {
    return new \App\TwitterApi\Client();
};

$container['hatena_bookmark.event_notification_parser'] = function ($c) {
    return new \App\HatenaBookmark\EventNotificationParser();
};

$container['hatebu_twitter_relay.relayer'] = function ($c) {
    return new \App\HatebuTwitterRelay\Relayer(
        new \App\TwitterApi\StatusUpdater($c['twitter_api.client'])
    );
};
