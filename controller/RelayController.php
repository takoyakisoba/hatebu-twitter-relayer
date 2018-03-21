<?php

namespace App\Controller;

use App\HatebuTwitterRelay\Relayer;
use App\HatenaBookmark\EventNotificationParser;

class RelayController extends BaseController
{
    public function processIncomingWebhook()
    {
        /** @var EventNotificationParser $parser */
        $parser = $this->container['hatena_bookmark.event_notification_parser'];
        $eventEntity = $parser->parse($this->request);
        if (!$eventEntity->verify()) {
            return $this->response
                ->withStatus(400)
                ->getBody()
                ->write('pre-shared key mismatched.');
        }
        if (!$eventEntity->validate()) {
            return $this->response
                ->withStatus(400)
                ->getBody()
                ->write('request validation failed.');
        }

        /** @var Relayer $relayer */
        $relayer = $this->container['hatebu_twitter_relay.relayer'];
        $relayer->relay($eventEntity);

        return $this->response
            ->withStatus(200)
            ->getBody()
            ->write('ok');
    }
}
