<?php
  require_once "vendor/autoload.php";
  require_once "router.php";
  require_once "request.php";

class App 
{
  public $router;
  public $request;

  public function __construct()
  {
    $this->request = new Request();
    $this->router = new Router($this->request);
  }

  public function run()
  {
    $this->router->resolve();
  }

 

}
