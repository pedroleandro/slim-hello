<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Exception\NotFoundException;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
// Add Routing Middleware
$app->addRoutingMiddleware();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);
//print_r($_SERVER);

$app->setBasePath("/web/slim-hello/public");

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->run();
