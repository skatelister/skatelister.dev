<?php
require_once __DIR__ . '/../../prime.php';

$errors = UserValidation::errors();

var_dump(Input::get('first_name'));
// if( isset($_POST['submit_form'])){
// }

if (empty($errors))
{
  $newUserProfile = new User();
  $newUserProfile->first_name = Input::get('first_name');
  $newUserProfile->last_name = Input::get('last_name');
  $newUserProfile->email = Input::get('email');
  $newUserProfile->password = Validation::hashPassword(Input::get('password'));
  try {
    $newUserProfile->save();
  } catch (PDOException $e) {
        $errors['emailDuplicate'] = "Email is already taken";
  }
  if(empty($errors)) {
    header('Location: /');
  }
}



?>

<?php require_once __DIR__ .'/../../views/partials/header.php';  ?>


    <form class=""  method="post">

        <div class="">
            <label for="first_name">First Name:</label>
            <input id="first_name" type="text" name="first_name"
            value="<?=empty($errors) ? '' : Input::get('first_name', '');?>">
            <span class="red"><?=isset($errors['first_name']) ? $errors['first_name'] : '' ; ?></span>
        </div>

        <div class="">
            <label for="last_name">Last Name:</label>
            <input id="last_name" type="text" name="last_name" 
            value="<?=empty($errors) ? '' : Input::get('last_name', '');?>">
            <span class="red"><?=isset($errors['last_name']) ? $errors['last_name'] : '' ; ?></span>
        </div>
        
        <div class="">
            <label for="email">Email:</label>
            <input id="email" type="text" name="email"
            value="<?=empty($errors) ? '': Input::get('email', '');?>">
            <span class="red"><?=isset($errors['email']) ? $errors['email'] : '' ; ?></span>
            <span class="red"><?=isset($errors['emailDuplicate']) ? $errors['emailDuplicate'] : '' ; ?></span>
        </div>

        <div class="">
            <label for="password">Password:</label>
            <input id="password" type="password" name="password">
            <span class="red"><?=isset($errors['password']) ? $errors['password'] : '' ; ?></span>
        </div>

        <div class="">
            <label for="verPassword">Verify Password:</label>
            <input id="verPassword" type="password" name="ver_password">
            <span class="red"><?=isset($errors['ver_password']) ? $errors['ver_password'] : '' ; ?></span>
        </div>
            <button type="submit" name="submit_form">Submit Form</button>
    </form>




<?php require_once __DIR__ .'/../../views/partials/footer.php';  ?>
