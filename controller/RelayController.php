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
            return;
        }
        if (!$eventEntity->validate()) {
            return;
        }

        /** @var Relayer $relayer */
        $relayer = $this->container['hatebu_twitter_relay.relayer'];
        $relayer->relay($eventEntity);

        return;
    }
}
