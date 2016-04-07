<?php
session_start();
 require_once '../prime.php';
 $errors = [];
 if (isset($_SESSION['user_info'])) {
     header('Location: /');
 }

 if (Input::has('sign_up')) {
   header('Location: /user/create');
   die();
 }

 if (Input::has('email')
 &&  Input::has('password')) {
   $email = Input::get_string('email');
   $password = Input::get_string('password');
   if ($email == '') {
     $errors['email'] = 'Email can not be empty.';
   }
   if ($password == '') {
     $errors['password'] = 'Password can not be empty.';
     echo'test';
   }
   try {
       $find_user_info =  User::find($email);

       if (! is_null($find_user_info)) {
           if (password_verify($password,$find_user_info->password)
             && $find_user_info->email == $email) {
               session_start();
               $_SESSION['user_info'] = $find_user_info;


              header("Location: /");
              die();
         //this else if is to catch if they put the right email but the wrong pass;
           }else if ($email != '' && $password != '') {
             $errors['wrong_info'] = "Email or Password was incorrect.";
           }
         //this else if is to catch if they put the wrong email or the wrong pass;
        }else if ($email != '' && $password != '') {
         $errors['wrong_info'] = "Email or Password was incorrect.";
        }


   } catch (PDOException $e) {

   }
 }
 ?>

 <!DOCTYPE html>
 <?php require_once __DIR__ .'/../views/partials/header.php';  ?>
  <main>
      <form method="post">

        <div class="">
          <label for="email">Email:</label>
          <input id="email" type="text" name="email" value="<?=  Input::get('email'); ?>">
         <?php if (isset($errors['email'])): ?>
           <span>
             <?= $errors['email']; ?>
           </span>
         <?php endif; ?>
           <span id='errors_email'></span>
        </div>
        <div class="">
          <label for="password">Password:</label>
          <input id="password" type="text" name="password" value="">

         <?php if (isset($errors['password'])): ?>
           <span>
             <?= $errors['password']; ?>
           </span>
         <?php endif; ?>
         <span id="errors_password"></span>

        </div>

       <?php if (! empty($errors) && isset($errors['wrong_info'])): ?>
         <p>
           <?= $errors['wrong_info']; ?>
         </p>
       <?php endif; ?>

       <span id="errors_wronginfo"></span>
       <button id="login_button"type="submit" name="button">submit</button>
      </form>
      <form class="" method="post">
        <div class="">
            <button type="submit" name="sign_up">Sign up</button>
        </div>
      </form>
  </main>
 <?php require_once __DIR__ .'/../views/partials/footer.php';  ?>
