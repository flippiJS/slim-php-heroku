<?php
error_reporting(-1);
ini_set('display_errors', 1);

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once '../vendor/autoload.php';

require_once './db/AccesoDatos.php';
// require_once './middlewares/Logger.php';

require_once './controllers/UsuarioController.php';


$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;

$app = new \Slim\App(["settings" => $config]);

// Usuarios
$app->group('/usuarios', function () {
    $this->get('[/]', \UsuarioController::class . ':TraerTodos');
    $this->get('/{usuario}', \UsuarioController::class . ':TraerUno');
    $this->post('[/]', \UsuarioController::class . ':CargarUno');
  });

$app->get('[/]', function (Request $request, Response $response) {    
    $response->getBody()->write("GET => Bienvenido!!! a SlimFramework");
    return $response;

});

$app->run();
