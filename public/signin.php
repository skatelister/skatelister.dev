<?php
require_once '../skateConfig.php';
require_once '../models/Users.php';
require_once '../utils/Input.php';
require_once '../utils/Auth.php';
$errors = [];

if (Input::has('sign_up')) {
  header('Location: users.create.php');
}

if (Input::has('email')
&&  Input::has('password')) {
  $email = Input::get('email');
  $password = Input::get('password');
  if ($email == '') {
    $errors['email'] = 'Email can not be empty.';
  }
  if ($password == '') {
    $errors['password'] = 'Password can not be empty.';
  }
  try {
      $findUsersInfo =  User::find($email);

      if (! is_null($findUsersInfo)) {
          if (password_verify($password,$findUsersInfo->user_pass)) {
              session_start();
              $_SESSION['usersInfo'] = $findUsersInfo;


             header("Location: index.php");
             die();
          }else if ($email != '' && $password != '') {
            $errors['wrong_info'] = "Email or Password was incorrect.";
          }

      }


  } catch (PDOException $e) {

  }

}




?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="/css/Bootstrap/bootstrap.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


    <form method="post">
      <div class="">
        <label for="email">Email:</label>
        <input id="email" type="text" name="email" value="<?=  Input::get('email'); ?>">
        <?php if (isset($errors['email'])): ?>
          <span>
            <?= $errors['email']; ?>
          </span>
        <?php endif; ?>
      </div>
      <div class="">
        <label for="password">Password:</label>
        <input id="password" type="text" name="password" value="">

        <?php if (isset($errors['password'])): ?>
          <span>
            <?= $errors['password']; ?>
          </span>
        <?php endif; ?>

      </div>

      <?php if (! empty($errors) && isset($errors['wrong_info'])): ?>
        <p>
          <?= $errors['wrong_info']; ?>
        </p>
      <?php endif; ?>
      <button type="submit" name="button">submit</button>
    </form>
    <form class="" method="post">
      <div class="">
        <button type="submit" name="sign_up"> Sign up</button>
      </div>

    </form>


    

  </body>
</html>
