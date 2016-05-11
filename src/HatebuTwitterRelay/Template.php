<?php

namespace App\HatebuTwitterRelay;

use App\HatenaBookmark\EventEntity;

class Template
{
    const TEMPLATE_PATH = APP_ROOT.'/config/template.php';

    public function __construct()
    {
        $this->template = require self::TEMPLATE_PATH;
    }

    public function bind(EventEntity $eventEntity)
    {
        $matches = [];
        preg_match_all('/(###[a-z]+###)+/', $this->template, $matches);
        list(, $vars) = $matches;

        $message = $this->template;
        foreach ($vars as $var) {
            $propertyName = str_replace('###', '', $var);
            var_dump($propertyName);
            $value = isset($eventEntity->$propertyName) ? $eventEntity->$propertyName : '';

            $message = str_replace($var, $value, $message);
        }

        return $message;
    }
}
