<?php
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response;
use Slim\Routing\RouteCollectorProxy;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->setBasePath('/api');

// Constants
define('LOCAL', strpos($_SERVER['SERVER_NAME'], 'local') !== false);

// Simple auth middleware
$authMiddleware = function (Request $request, RequestHandler $handler) {
  
  if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    return $handler->handle($request);
  } 

  $response = new Response();
  $response->getBody()->write(json_encode([
    'success' => false,
    'message' => 'Not logged in'
  ]));
  return $response->withHeader('Content-Type', 'application/json')->withStatus(401);

};

$app->group('', function (RouteCollectorProxy $group) {
  
  $group->get('/app', function (Request $request, Response $response, $args) {
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

})->add($authMiddleware);

// Only enable these routes locally!
if (LOCAL) {
  $app->group('/dev', function (RouteCollectorProxy $group) {
  
    // Get the session details
    $group->get('/session', function (Request $request, Response $response, $args) {
      if (session_status() !== PHP_SESSION_ACTIVE) { session_start(); }
      $response->getBody()->write(json_encode([
        'session' => $_SESSION,
        'sessionid' => session_id()
      ]));
      return $response->withHeader('Content-Type', 'application/json');
    });
  
    // Update the session 
    $group->post('/session', function (Request $request, Response $response, $args) {
      $parsedBody = $request->getParsedBody();
      $sessionid = $parsedBody['sessionid'] ?? null;
  
      if (empty($sessionid)) {
        $response->getBody()->write(json_encode([
          'success' => false,
          'message' => 'Expected parameter "sessionid" not found'
        ]));
        return $response->withHeader('Content-Type', 'application/json');
      }
  
      // Ensure the session has started
      if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
      }
  
      if (session_id() === $sessionid) {
        $response->getBody()->write(json_encode([
          'success' => false,
          'message' => 'Session already active'
        ]));
        return $response->withHeader('Content-Type', 'application/json');
      }
  
      session_unset();
      session_destroy();
      session_id($sessionid);
      session_start();
      session_write_close();
      
      $response->getBody()->write(json_encode([
        'success' => true
      ]));
      return $response->withHeader('Content-Type', 'application/json');
    });
  
    // Get the session details by text
    $group->get('/sessionid', function (Request $request, Response $response, $args) {
      if (session_status() !== PHP_SESSION_ACTIVE) { 
        session_start(); 
      }
      $response->getBody()->write(session_id());
      return $response;
    });
  
  });
}

$app->run();