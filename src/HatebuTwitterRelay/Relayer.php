<?php

namespace App\HatebuTwitterRelay;

use App\HatenaBookmark\EventEntity;
use App\TwitterApi\StatusUpdater as StatusUpdater;

class Relayer
{
    private $template;
    private $statusUpdater;

    public function __construct(StatusUpdater $statusUpdater)
    {
        $this->template = new Template();
        $this->statusUpdater = $statusUpdater;
    }

    public function relay(EventEntity $eventEntity)
    {
        $message = $this->template->bind($eventEntity);
        $this->statusUpdater->update($message);

        return true;
    }
}
