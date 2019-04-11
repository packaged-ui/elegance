<?php

use Cubex\Context\Context;
use Cubex\Cubex;
use Cubex\Routing\Router;
use Packaged\Dispatch\Dispatch;
use PackagedUi\FusionDemo\Demo;

$loader = require_once 'vendor/autoload.php';
$launcher = new Cubex(dirname(__DIR__), $loader);
$dispatchPath = '/_r';
Dispatch::bind(new Dispatch(dirname(__DIR__), $dispatchPath));

$router = Router::i();
$router->handleFunc(
  $dispatchPath,
  function (Context $c) { return Dispatch::instance()->handleRequest($c->request()); }
);
$router->handleFunc("/", function (Context $c) { return (new Demo())->setContext($c)->render(); });
$launcher->handle($router);