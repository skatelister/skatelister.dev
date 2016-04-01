<?php
require_once '../skateConfig.php';
require_once '../utils/Users.php';
require_once '../utils/Input.php';
require_once '../utils/Auth.php';

if (Input::has('sign_up')) {
  header('Location: users.create.php');
}

if (Input::has('email')
&&  Input::has('password')) {
  $email = Input::get('email');
  $password = Input::get('password');
  try {
      $findUsersInfo =  User::find($email);

      if (! is_null($findUsersInfo)) {
          if (password_verify($password,$findUsersInfo->user_pass)) {
              session_start();
              $_SESSION['usersInfo'] = $findUsersInfo;
              var_dump($_SESSION['usersInfo']->email);

             header("Location: index.php");
             die();
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
        <input id="email" type="text" name="email" value="">
      </div>
      <div class="">
        <label for="password">Password:</label>
        <input id="password" type="text" name="password" value="">
      </div>
      <button type="submit" name="button">submit</button>
    </form>
    <form class="" method="post">
      <div class="">
        <button type="submit" name="sign_up"> Sign up</button>
      </div>

    </form>
  </body>
</html>
