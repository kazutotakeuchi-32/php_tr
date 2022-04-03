<?php
require_once "vendor/autoload.php";
require_once "model/user.php";

class UsersContoroller
{
  function render() {
    $user = new User("taro", "yamada", 20, "password", "");
    var_dump($user);
  }
}


UsersContoroller::render();
