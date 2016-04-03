<?php
require '../skateConfig.php';
require_once '../models/Users.php';
require_once '../utils/Input.php';
session_start();
$errors = [];
$data_saved = [];
var_dump($_SESSION);
$id =  $_SESSION['usersInfo']->id;
$first_name = $_SESSION['usersInfo']->first_name;
$last_name = $_SESSION['usersInfo']->last_name;
$email = $_SESSION['usersInfo']->email;
$password = $_SESSION['usersInfo']->user_pass;

if (input::get('first_name') != '') {
  $first_name = Input::get('first_name');
  $data_saved['first_name'] = 'First name has been saved.';
}

if (Input::get('last_name') != '') {
  $last_name = Input::get('last_name');
  $data_saved['last_name'] = 'Last name has been saved.';
}

if (Input::get('password') != '') {
  if (Input::get('password') == Input::get('ver_password')) {
    $password = password_hash(Input::get('password'),PASSWORD_DEFAULT);
    $data_saved['password'] = 'Password name has been saved.';
  }else {
    $errors['wrongpass'] = 'Passwords did not match.';
  }
}

if (Input::get('first_name') == ''
  && Input::get('last_name') == ''
  && Input::get('password') == ''
  && Input::get('ver_password') == ''
  && Input::has('submit_form')) {
$errors['not_saved'] = 'No changes where made';
}



$newUserInfo = new User();
$newUserInfo->id =$id;
$newUserInfo->first_name = $first_name;
$newUserInfo->last_name = $last_name;
$newUserInfo->email = $email;
$newUserInfo->user_pass = $password;
$newUserInfo->save();
$_SESSION['usersInfo'] = $newUserInfo;
var_dump($_SESSION['usersInfo']);
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="/css/Bootstrap/bootstrap.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  <?php require_once __DIR__ .'/../views/partials/loggedin/navbar.php';  ?>
                <form class=""  method="post">

                    <div class="">
                        <label for="first_name">First Name:</label>
                        <input id="first_name" type="text" name="first_name">
                        <?php if (isset($data_saved['first_name'])): ?>
                                <span> <?= $data_saved['first_name'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="">
                        <label for="last_name">Last Name:</label>
                        <input id="last_name" type="text" name="last_name">
                        <?php if (isset($data_saved['last_name'])): ?>
                                <span> <?= $data_saved['last_name'] ?></span>
                        <?php endif; ?>
                    </div>
                    </div>
                    <div class="">
                        <label for="password">Password:</label>
                        <input id="password" type="text" name="password">
                    </div>
                    <div class="">
                        <label for="verPassword">Verify Password:</label>
                        <input id="verPassword" type="text" name="ver_password">

                        <?php if (isset($data_saved['password'])): ?>
                                <span> <?= $data_saved['password'] ?></span>
                        <?php endif; ?>

                        <?php if (isset($errors['wrongpass'])): ?>
                                <span> <?= $errors['wrongpass'] ?></span>
                        <?php endif; ?>

                        <?php if (isset($errors['not_saved'])): ?>
                                <p> <?= $errors['not_saved'] ?></p>
                        <?php endif; ?>
                    </div>
                        <button type="submit" name="submit_form">Submit Form</button>
                </form>
  </body>
</html>
