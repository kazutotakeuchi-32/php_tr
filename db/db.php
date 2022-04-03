<?php 

require 'vendor/autoload.php';

class Db
{
  public static function connect()
  {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__. "/..")->load();
    $dsn = "mysql:dbname={$dotenv['DB_DATABASE']};host={$dotenv['DB_HOST']};";
    $user = $dotenv["DB_USERNAME"];
    $password = $dotenv["DB_PASSWORD"];
    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
    ];
    $dbh = new PDO($dsn, $user, $password, $options);
    $dbh->query('SET NAMES utf8');
    return $dbh;
  }
}


$pdo = Db::connect();
$sql = "SELECT * FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();

var_dump($users);

