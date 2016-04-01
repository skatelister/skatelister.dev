<?php
require_once 'db_connect.php';
require_once '../skateConfig.php';

$stmt = $dbc->prepare('INSERT INTO user(first_name,last_name,email,password)
VALUES (:first_name,:last_name,:email,:password)');

foreach ($parksInArray as $park) {


    $stmt->bindValue(':first_name', $//placeholder[0], PDO::PARAM_STR);
    $stmt->bindValue(':last_name', $//placeholder[1], PDO::PARAM_STR);
    $stmt->bindValue(':email', $//placeholder[2], PDO::PARAM_STR);
    $stmt->bindValue(':password', $//placeholder[3], PDO::PARAM_INT);

    $stmt->execute();
}


?>
