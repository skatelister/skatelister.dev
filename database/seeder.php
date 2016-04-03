<?php
require_once '../skateConfig.php';
require_once 'db_connect.php';

$stmt = $dbc->prepare('INSERT INTO users(first_name, last_name, email, password)
VALUES (:first_name,:last_name,:email,:password)');


$users = [
	['Tomas', 'Leffew', 'tleffew@gmail.com', 'password'],

	['CJ', 'Sampson', 'cjsampson@gmail.com', 'password'],

	['Don', 'Moore', 'donmoore@gmail.com', 'password'],

	['Richard', 'Delosantos', 'richardd@gmail.com', 'password'],

	['Steven', 'Henderson', 'stevenhenderson@gmail.com', 'password']
];

foreach ($users as $user) {

    $stmt->bindValue(':first_name', $user[0], PDO::PARAM_STR);
    $stmt->bindValue(':last_name', $user[1], PDO::PARAM_STR);
    $stmt->bindValue(':email', $user[2], PDO::PARAM_STR);
    $stmt->bindValue(':password', $user[3], PDO::PARAM_STR);

    $stmt->execute();
}

$statement = $dbc->prepare("INSERT INTO items(title, available, date_posted, category, description, image, user_id)
							VALUES(:title, :available, :date_posted, :category, :description, :image, :user_id");

$items = [
	['Selling my favorite skateboard $100', 1, 'skateboard', "I don't want to sale her but I have to get some quick cash.  Will go fast!", "", 1],

	['Skateboard wheels for $50', 1, 'wheels', ]


]


?>
