<?php
require_once __DIR__ . '/skateConfig.php';
require_once __DIR__ . '/db_connect.php';


$userTable = "CREATE TABLE users(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  first_name  VARCHAR(40) NOT NULL ,
  last_name VARCHAR(40) NOT NULL,
  email VARCHAR(40) NOT NULL,
  user_pass VARCHAR(40) NOT NULL,
  user_id SMALLINT NOT NULL,
  PRIMARY KEY(id)
);";

$itemsTable = "CREATE TABLE items (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  title VARCHAR(255),
  available TINYINT,
  date_posted DATETIME NOT NULL,
  category SMALLINT NOT NULL,
  description TEXT NOT NULL,
  image VARCHAR(255),
  user_id SMALLINT(5) UNSIGNED NOT NULL,
  PRIMARY KEY(id)        
);";

$foreignKey = ("ALTER TABLE items
ADD CONSTRAINT FK_items
FOREIGN KEY (user_id) REFERENCES users(id)
ON UPDATE CASCADE
ON DELETE CASCADE
);";

?>

