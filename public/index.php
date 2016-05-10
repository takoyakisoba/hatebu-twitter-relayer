<?php

require_once dirname(__DIR__).'/bootstrap.php';

$app = new \Slim\App($container);

require_once APP_ROOT.'/config/routes.php';

$app->run();
