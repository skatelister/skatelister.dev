<?php
require_once '../prime.php';
session_start();
if (! isset($_SESSION['usersInfo'])) {
    header('Location: index.php');
    die();
}
$errors = [];
$data_saved = [];
$id =  $_SESSION['usersInfo']->id;
$first_name = $_SESSION['usersInfo']->first_name;
$last_name = $_SESSION['usersInfo']->last_name;
$email = $_SESSION['usersInfo']->email;
$password = $_SESSION['usersInfo']->password;

if (input::get('first_name') != '') {
  $first_name = Input::get('first_name');
  $data_saved['first_name'] = 'First name has been saved.';
}

if (Input::get('last_name') != '') {
  $last_name = Input::get('last_name');
  $data_saved['last_name'] = 'Last name has been saved.';
}

if (Input::get('password') != '' || Input::get('ver_password') != '') {
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
$newUserInfo->password = $password;
$newUserInfo->save();
$_SESSION['usersInfo'] = $newUserInfo;

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="/css/Bootstrap/bootstrap.css">
    <link rel="stylesheet" href="/css/main.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  <?php require_once __DIR__ .'/../views/partials/loggedin/navbar.php';  ?>
  <main>

      <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6">




              <form role="form">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input id="first_name" type="text" class="form-control" name="first_name">
                    <?php if (isset($data_saved['first_name'])): ?>
                            <span> <?= $data_saved['first_name'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input id="last_name" type="text" class="form-control" name="last_name">
                    <?php if (isset($data_saved['last_name'])): ?>
                            <span> <?= $data_saved['last_name'] ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input id="password" type="text" class="form-control" name="password">
                <div class="form-group">
                    <label for="verPassword">Verify Password:</label>
                    <input id="verPassword" type="text" class="form-control" name="ver_password">

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

                <button type="submit" name="submit_form" class="btn btn-default">Submit Form</button>
            </form>
      </div>
    </div>
  </main>
  </body>
</html>
