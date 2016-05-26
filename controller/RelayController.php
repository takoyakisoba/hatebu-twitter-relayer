<?php

namespace App\Controller;

class RelayController extends BaseController
{
    public function processIncomingWebhook()
    {
        $parser = $this->container['hatena_bookmark.event_notification_parser'];
        $eventEntity = $parser->parse($this->request);
        if (!$eventEntity->verify()) {
            return;
        }
        if (!$eventEntity->validate()) {
            return;
        }

        $relayer = $this->container['hatebu_twitter_relay.relayer'];
        $relayer->relay($eventEntity);

        return;
    }
}
