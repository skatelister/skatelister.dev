<?php
require_once '../skateConfig.php';
require_once '../utils/Users.php';
require_once '../utils/Input.php';
$errors = [];


$require = ['first_name','last_name','email','password','ver_password'];
if (Input::has('first_name')
    && Input::has('last_name')
    && Input::has('email')
    && Input::has('password')
    && Input::has('ver_password')) {


    if (Input::get('first_name') == '') {
        $errors['first_name'] = 'First name needs a value';
    }else {
        $first_name = strip_tags(trim(Input::get('first_name')));
    }

    if (Input::get('last_name') == '') {
        $errors['last_name'] = 'Last name needs a value';
    }else {
        $last_name = strip_tags(trim(Input::get('last_name')));
    }

    if (Input::get('email') =='') {
        $errors['email'] = 'Email name needs a value';
    }else {
        $email = strip_tags(trim(Input::get('email')));
    }

    if (Input::get('password') =='') {
        $errors['password'] = 'Password needs a value';
    }else {
        $email = strip_tags(trim(Input::get('email')));
    }

    if (Input::get('ver_password') =='') {
      $errors['ver_password'] = 'Password needs a value';
    }else {
        $email = strip_tags(trim(Input::get('email')));
    }

    try {
        if (Input::get('password') == Input::get('ver_password')) {
            $password = strip_tags(trim(Input::get('password')));
        }else{
            throw new Exception("Password's did not match.");
            var_dump($errors);
        }
    } catch (Exception $e) {
        $errors['wrongpass'] = $e->getMessage();
    }

    if (isset($password)) {
        $password = password_hash($password,PASSWORD_DEFAULT);
    }

    if (Input::input_not_empty($require) && empty($errors)) {
      $newUserProfile = new User();
      $newUserProfile->first_name = $first_name;
      $newUserProfile->last_name = $last_name;
      $newUserProfile->email = $email;
      $newUserProfile->user_pass = $password;
      try {
        $newUserProfile->save();
      } catch (PDOException $e) {
          var_dump($e->getMessage());
        $errors['emailUsed'] = "The email was already used.";
      }

    }
    var_dump($errors);
    if (Input::has('submit_form')
     && empty($errors)) {
      header('Location: signin.php');
      die();

    }

}
?>


<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="/css/">
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>



                <form class=""  method="post">

                    <div class="">
                        <label for="first_name">First Name:</label>
                        <input id="first_name" type="text" name="first_name" value="<?=  Input::get('first_name'); ?>">

                        <?php if (isset($errors['first_name'])): ?>
                                <span> <?= $errors['first_name'] ?></span>
                        <?php endif; ?>

                    </div>
                    <div class="">
                        <label for="last_name">Last Name:</label>
                        <input id="last_name" type="text" name="last_name" value="<?= Input::get('last_name'); ?>">
                        <?php if (isset($errors['last_name'])): ?>
                                <span> <?= $errors['last_name'] ?></span>
                        <?php endif; ?>
                    </div>
                    </div>
                    <div class="">
                        <label for="email">Email:</label>
                        <input id="email" type="text" name="email" value="<?=  Input::get('email'); ?>">

                        <?php if (isset($errors['email'])): ?>
                                <span> <?= $errors['email'] ?></span>

                        <?php elseif(isset($errors['emailUsed'])): ?>
                                <span> <?= $errors['emailUsed'] ?></span>
                        <?php endif; ?>

                    </div>
                    <div class="">
                        <label for="password">Password:</label>
                        <input id="password" type="text" name="password">
                        <?php if (isset($errors['password'])): ?>
                                <span> <?= $errors['password'] ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="">
                        <label for="verPassword">Verify Password:</label>
                        <input id="verPassword" type="text" name="ver_password">
                        <?php if (isset($errors['ver_password'])): ?>
                                <span> <?= $errors['ver_password'] ?></span>
                        <?php endif; ?>
                        <?php if (isset($errors['wrongpass'])): ?>
                                <span> <?= $errors['wrongpass'] ?></span>

                        <?php endif; ?>
                    </div>
                        <button type="submit" name="submit_form">Submit Form</button>
                </form>



        <script src="/js/jquery-1.12.0.js"></script>
        <script src="/js/"></script>
    </body>
</html>
