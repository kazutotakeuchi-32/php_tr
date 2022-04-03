CREATE DATABASE php_tr;

use php_tr;

-- usersテーブル 
CREATE TABLE users (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(50) NOT NULL,
  age INT(3),
  password VARCHAR(255) NOT NULL,
  create_at TIMESTAMP,
  update_at TIMESTAMP,
);
