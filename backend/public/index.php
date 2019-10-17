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
$app->get('/create', function (Request $request, Response $response, array $args) {
  $object = $request->getMethod();
  TomlFile::createFile($object);
  $response->getBody()->write($object);
});

// Run application
$app->run();


