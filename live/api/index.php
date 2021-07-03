<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->setBasePath('/api');

$app->get('/app', function (Request $request, Response $response, $args) {
  $data = [
    'profile' => [
      'firstname' => 'John',
      'lastname' => 'Doe'
    ]
  ];
  $payload = json_encode($data);

  $response->getBody()->write($payload);
  return $response->withHeader('Content-Type', 'application/json');
});

$app->run();