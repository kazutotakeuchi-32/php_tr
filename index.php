<?php

require_once "vendor/autoload.php";
require_once "config/app.php";
require_once "controller/usersController.php";

$app = new App();

$app->router->get('/', function () {
  return 'Hello, world';
});

$app->router->get('/users', function(){
  UsersContoroller::render();
});

$app->router->get('/contact', function () {
  return 'Contact';
});

$app->run();