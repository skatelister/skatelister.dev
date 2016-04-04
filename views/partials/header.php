<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/css/Bootstrap/bootstrap.css">
        <link rel="stylesheet" href="/css/main.css">
        <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
        <meta charset="utf-8">
        <title>Skatelister</title>
    </head>
    <body>
        <?php if (isset($_SESSION['usersInfo'])): ?>
            <?php require_once '../views/partials/loggedin/navbar.php';  ?>
        <?php else: ?>
            <?php require_once '../views/partials/navbar.php';  ?>
        <?php endif; ?>