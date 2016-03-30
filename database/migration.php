<?php
require_once __DIR__ . '/skateConfig.php';
$tableCreate = "CREATE TABLE users(
  id INT NOT NULL AUTO_INCREMENT,
  first_name  VARCHAR(40) NOT NULL ,
  last_name VARCHAR(40) NOT NULL,
  email VARCHAR(40) NOT NULL,
  user_pass VARCHAR(40) NOT NULL,
  PRIMARY KEY(id)
);";


?>
