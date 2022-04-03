<?php

class User {
  
  public $name;
  public $age ;
  public $password;
  public $email;

  public function __construct(string $firstname, string $lastname, int $age, string $password, string $email)
  {
    $this->firstname = $firstname;
    $this->lastname = $lastname; 
    $this->age = $age;
    $this->password = $password;
    $this->email = $email;
  } 

  // ゲッター

  public function getName(): string
  {
    return $this->firstname . " " . $this->lastname;
  }

  public function getAge(): int
  {
    return $this->age;
  }

  public function getPassword(): int
  {
    return $this->password;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  // セッター

  public function setName(string $name): void
  {
    $this->name = $name;
  }

  public function setAge(int $age): void
  {
    $this->age = $age;
  }

  public function setPassword(string $password): void
  {
    $this->password = $password;
  }

  public function setEmail(string $email): void
  {
    $this->email = $email;
  }

  public function __toString()
  {
    return "User: " . $this->name . " " . $this->age . " " . $this->password . " " . $this->email;
  }

  static public function create($params):array {
    try {
      if(is_bool($this->validation($params)) === false){
        throw new Exception("入力された値が不正です");
      }
      $dbh = Db::connect();
      $sql = "INSERT INTO users (firstname, lastname, age, password, email) VALUES (:firstname, :lastname, :age, :password, :email)";
      $stmt = $dbh->prepare($sql);
      $stmt->bindValue(":firstname", $params["firstname"]);
      $stmt->bindValue(":lastname", $params["lastname"]);
      $stmt->bindValue(":age", $params["age"]);
      $stmt->bindValue(":password", $params["password"]);
      $stmt->bindValue(":email", $params["email"]);
      $stmt->execute();
      $dbh = null;
      return ["status" => "success"];
    } catch (\Throwable $th) {
      return ["status" => "error", "message" => $th->getMessage()];
    }
  }

  static public function find(int $id):array {
    try {
      $dbh = Db::connect();
      $sql = "SELECT * FROM users WHERE id = :id" ;
      $stmt = $dbh->prepare($sql);
      $stmt->bindValue(":id", $id);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      $dbh = null;
      return ["status" => "success", "data" => $result];
     } catch (\Throwable $th) {
      throw $th;
    }
  }

  static public function findByEmail(string $email):array {
    try {
      $dbh = Db::connect();
      $sql = "SELECT * FROM users WHERE email = :email" ;
      $stmt = $dbh->prepare($sql);
      $stmt->bindValue(":email", $email);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      $dbh = null;
      return ["status" => "success", "data" => $result];
     } catch (\Throwable $th) {
      throw $th;
    }
  }

  static public function All(array $params):array {
    try {
      $db = Db::connect();
      $sql = "SELECT * FROM users";
      $stmt = $db->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $db = null;
      return ["status" => "success", "data" => $result];
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  function validation($params): bool {
    if(!isset($params["firstname"]) || !isset($params["lastname"]) || !isset($params["age"]) || !isset($params["password"]) || !isset($params["email"])){
      return false;
    }
    if (!filter_var($params["email"], FILTER_VALIDATE_EMAIL)) {
      return false;
    }
    if(!preg_match("/^[a-zA-Z0-9]{4,}$/", $params["password"])){
      return false;
    }
    if(!preg_match("/^[a-zA-Z0-9]{4,}$/", $params["firstname"])){
      return false;
    }
    if(!preg_match("/^[a-zA-Z0-9]{4,}$/", $params["lastname"])){
      return false;
    }
    if(!preg_match("/^[0-9]{1,3}$/", $params["age"])){
      return false;
    }
    if(!preg_match("/^[0-9]{1,3}$/", $this->age)){
      return false;
    }
    return true;
  }

  static public function update(array $params): array {
    try {
      if(is_bool($this->validation($params)) === false){
        throw new Exception("入力された値が不正です");
      }

      $dbh = Db::connect();
      $sql = "UPDATE users SET firstname = :firstname, lastname = :lastname, age = :age, email = :email WHERE id = :id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindValue(":firstname", $params["firstname"]);
      $stmt->bindValue(":lastname", $params["lastname"]);
      $stmt->bindValue(":age", $params["age"]);
      $stmt->bindValue(":email", $params["email"]);
      $stmt->bindValue(":id", $params["id"]);
      $stmt->execute();
      $dbh = null;
      return ["status" => "success"];
    } catch (\Throwable $th) {
      return ["status" => "error", "message" => $th->getMessage()];
    }
  }

}

$user = new User("John", "Doe", 25, "12345", "");
echo $user->__toString();