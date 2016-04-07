<?php
require_once __DIR__ . '/../../prime.php';


$errors = UserValidation::errors();
    

if (empty($errors)) 
{
  $newUserProfile = new User();
  $newUserProfile->first_name = trim(Input::get('first_name'));
  $newUserProfile->last_name = trim(Input::get('last_name'));
  $newUserProfile->email = trim(Input::get('email'));
  $newUserProfile->password = trim(Input::get('password'));
  $newUserProfile->save();
}



?>

<?php require_once __DIR__ .'/../../views/partials/header.php';  ?>


    <form class=""  method="post">

        <div class="">
            <label for="first_name">First Name:</label>
            <input id="first_name" type="text" name="first_name"
            value="<?=empty($errors) ? '' : Input::get('last_name', '');?>">
            <span class="red"><?=isset($errors['first_name']) ? $errors['first_name'] : '' ; ?></span>
        </div>

        <div class="">
            <label for="last_name">Last Name:</label>
            <input id="last_name" type="text" name="last_name" 
            value="<?=empty($errors) ? '' : Input::get('last_name', '');?>">
            <span class="red"><?=isset($errors['last_name']) ? $errors['first_name'] : '' ; ?></span>
        </div>
        
        <div class="">
            <label for="email">Email:</label>
            <input id="email" type="text" name="email"
            value="<?=empty($errors) ? '': Input::get('email', '');?>">
            <span class="red"><?=isset($errors['email']) ? $errors['email'] : '' ; ?></span>
        </div>

        <div class="">
            <label for="password">Password:</label>
            <input id="password" type="text" name="password"
            value="<?=empty($errors) ? '': Input::get('password', '');?>">
            <span class="red"><?=isset($errors['password']) ? $errors['password'] : '' ; ?></span>
        </div>

        <div class="">
            <label for="verPassword">Verify Password:</label>
            <input id="verPassword" type="text" name="ver_password"
            value="<?=empty($errors) ? '': Input::get('ver_password', '');?>">
            <span class="red"><?=isset($errors['ver_password']) ? $errors['ver_password'] : '' ; ?></span>
        </div>
            <button type="submit" name="submit_form">Submit Form</button>
    </form>




<?php require_once __DIR__ .'/../../views/partials/footer.php';  ?>
