<?php
require_once '../skateConfig.php';
require_once '../utils/Users.php';
require_once '../utils/Input.php';
$errors = [];

$require = ['first_name','last_name','email','password'];
if (Input::has('first_name')
    && Input::has('last_name')
    && Input::has('email')
    && Input::has('password')
    && Input::has('ver_password')) {

        $email = trim(Input::get('email'));
        try {
          if (! Input::has('first_name')) {
            $errors['first_name'] = 'First name needs a value';
          }else {
            $first_name = strip_tags(trim(Input::get('first_name')));
          }
        } catch (Exception $e) {

        }

        try {
          if (! Input::has('last_name')) {
            $errors['last_name'] = 'Last name needs a value';
          }else {
            $last_name = strip_tags(trim(Input::get('last_name')));
          }
        } catch (Exception $e) {

        }


        try {
              if (! Input::has('email')) {
                  $errors['email'] = 'Email name needs a value';
              }else {
              $email = strip_tags(trim(Input::get('email')));
              }
          } catch (Exception $e) {

          }

          try {
            if (Input::get('password') == Input::get('ver_password')) {
              $password = strip_tags(trim(Input::get('password')));
            }else{
              throw new Exception("Password's did not match.");

            }

          } catch (Exception $e) {
            $errors['wrongpass'] = $e->getMessage();
          }

                  if ($last_name == '') {
                      $errors['last_name'] = 'Last name needs a value';
                  }
                  if ($email == '') {
                      $errors['email'] = 'Email name needs a value';
                  }
        $password = sha1($password);
        if (Input::input_not_empty($require)) {
          $newUserProfile = new User();
          $newUserProfile->first_name = $first_name;
          $newUserProfile->last_name = $last_name;
          $newUserProfile->email = $email;
          $newUserProfile->user_pass = $password;
          try {
            $newUserProfile->save();
          } catch (PDOException $e) {
            $errors['emailUsed'] = "The email was already used.";
          }

        }

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
                        <input id="first_name" type="text" name="first_name">

                        <?php if (isset($errors['first_name'])): ?>
                                <p> <?= $errors['first_name'] ?></p>
                        <?php endif; ?>

                    </div>
                    <div class="">
                        <label for="last_name">Last Name:</label>
                        <input id="last_name" type="text" name="last_name">
                        <?php if (isset($errors['last_name'])): ?>
                                <p> <?= $errors['last_name'] ?></p>
                        <?php endif; ?>
                    </div>
                    </div>
                    <div class="">
                        <label for="email">Email:</label>
                        <input id="email" type="text" name="email" value="<?= Input::get('area_in_acres') ?>">

                        <?php if (isset($errors['email'])): ?>
                                <p> <?= $errors['email'] ?></p>
                        <?php endif; ?>

                    </div>
                    <div class="">
                        <label for="password">Password:</label>
                        <input id="password" type="text" name="password">
                    </div>

                    <div class="">
                        <label for="verPassword">Verify Password:</label>
                        <input id="verPassword" type="text" name="ver_password">
                    </div>
                        <button type="submit" name="submit_form">Submit Form</button>
                </form>



        <script src="/js/jquery-1.12.0.js"></script>
        <script src="/js/"></script>
    </body>
</html>
