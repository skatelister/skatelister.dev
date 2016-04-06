<?php
if (Input::has('sign_up')) {
   header('Location: /user/create');
   die();
 }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/css/Bootstrap/bootstrap.css">
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="/css/modal.css">
        <link rel="stylesheet" href="/css/signin.css">
        <link href='https://fonts.googleapis.com/css?family=Cabin:400,700' rel='stylesheet' type='text/css'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>Skatelister</title>
    </head>
    <body>
    <?php require_once '../views/partials/navbar.php';  ?>
