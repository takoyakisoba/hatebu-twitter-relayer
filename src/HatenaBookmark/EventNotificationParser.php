<?php

namespace App\HatenaBookmark;

use App\HatenaBookmark\EventEntity as EventEntity;

class EventNotificationParser
{
    public function parse($request)
    {
        $body = $request->getParsedBody();

        $eventEntity = new EventEntity();

        $eventEntity->username      = $body['username'];
        $eventEntity->title         = $body['title'];
        $eventEntity->url           = $body['url'];
        $eventEntity->bookmarkCount = $body['count'];
        $eventEntity->permalink     = $body['permalink'];
        $eventEntity->status        = $body['status'];
        $eventEntity->comment       = $body['comment'];
        $eventEntity->timestamp     = $body['timestamp'];
        $eventEntity->isPrivate     = $body['is_private'];
        $eventEntity->key           = $body['key'];

        $eventEntity->client = isset($body['client']) ? $body['client'] : null;
        $eventEntity->color  = isset($body['color']) ? $body['color'] : null;
        $eventEntity->quote  = isset($body['quote']) ? $body['quote'] : null;

        return $eventEntity;
    }
}
