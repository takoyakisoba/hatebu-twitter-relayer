<?php

use App\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$c = $container;

$app->get('/ping', function (Request $req, Response $res) {
    $res->getBody()->write('pong');
    return $res;
});

$app->post('/webhook/hatebu-notification', function (Request $req, Response $res) use ($c) {
    return (new Controller\RelayController($req, $res, $c))
        ->processIncomingWebhook();
});
