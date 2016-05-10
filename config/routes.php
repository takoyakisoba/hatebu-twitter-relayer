<?php

use App\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/ping', function (Request $req, Response $res) {
    $res->getBody()->write('pong');
    return $res;
});
