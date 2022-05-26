<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/fruits', function (Request $request, Response $response, $args) {
    $fruits = [
        '1' => 'Banana',
        '2' => 'Laranja',
        '3' => 'Abacaxi'
    ];

    $response->getBody()->write(json_encode($fruits));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->get('/fruits/{id}', function (Request $request, Response $response, $args) {
    $fruits = [
        '1' => 'Banana',
        '2' => 'Laranja',
        '3' => 'Abacaxi'
    ];

    $fruit[$args['id']] = $fruits[$args['id']];

    $response->getBody()->write(json_encode($fruit));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();