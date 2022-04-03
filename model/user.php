<?php
class User {
  public static $g = "TE";
  public $name;
  public $age ;
  public $password;
  public $email;

  public function __construct(string $name, int $age, string $password, string $email)
  {
    $this->name = $name;
    $this->age = $age;
    $this->password = $password;
    $this->email = $email;
  } 

  public function getName(): string
  {
    return $this->name;
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

  static public function test(): void{
    echo "test";
  }

  public function __toString()
  {
    return "User: " . $this->name . " " . $this->age . " " . $this->password . " " . $this->email;
  }

}

$user = new User("kazuto", 10, "", "");
echo $user->__toString();