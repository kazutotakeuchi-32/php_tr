<?php 
class Db
{

  public static function connect()
  {
    $dsn = 'mysql:dbname=php_tr;host=localhost';
    $user = 'root';
    $password = 'yes';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query('SET NAMES utf8');
    return $dbh;
  }

}

