<?php
require_once __DIR__ . '/../skateConfig.php';
require_once 'db_connect.php';



$itemsDropTable = "DROP TABLE IF EXISTS ads";
$dbc->exec($itemsDropTable);

$userDropTable = "DROP TABLE IF EXISTS users";
$dbc->exec($userDropTable);



$userTable = "CREATE TABLE users(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  first_name  VARCHAR(40) NOT NULL ,
  last_name VARCHAR(40) NOT NULL,
  email VARCHAR(40) NOT NULL UNIQUE,
  password VARCHAR(120) NOT NULL,
  PRIMARY KEY(id)
)";
$dbc->exec($userTable);

$adsTable = "CREATE TABLE ads (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  title VARCHAR(255),
  available TINYINT DEFAULT 1,
  date_posted DATETIME NOT NULL,
  category VARCHAR(100) NOT NULL,
  description TEXT NOT NULL,
  image VARCHAR(255),
  user_id INT(5) UNSIGNED NOT NULL,
  views INT(5) UNSIGNED DEFAULT 1,
  PRIMARY KEY(id),
  FOREIGN KEY (user_id) REFERENCES users(id)
)";
 $dbc->exec($adsTable);

?>
