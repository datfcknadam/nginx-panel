<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, X-authentication,Content-Type, X-client');

require_once "TomlFile.php";
require __DIR__ . '/../vendor/autoload.php';

// Instantiate app
$app = AppFactory::create();

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

// Add route callbacks
$app->get('/', function (Request $request, Response $response) {

  $array = TomlFile::searchFile(__DIR__.'/host');
  $array = json_encode($array);
  $response->getBody()->write($array);
  return $response;
});
$app->post('/create', function (Request $request, Response $response, array $args) {

  $request_data = $request->getParsedBody();
  $request_data = json_decode($request_data);
  TomlFile::createFile($request_data);
  $response->getBody()->write($request_data);
  
});

// Run application
$app->run();


