<?php
require_once __DIR__ . '/../../prime.php';

Validation 

$errors = UserValidation::errorMessages(); //extend Validation

$errors = [];
$require = ['first_name','last_name','email','password','ver_password'];
if (Input::has('first_name')
    && Input::has('last_name')
    && Input::has('email')
    && Input::has('password')
    && Input::has('ver_password')) {


    if (Input::get_string('first_name') == '') {
        $errors['first_name'] = 'First name needs a value';
    }else {
        $first_name_unstripped = Input::get('first_name');
    }

    if (Input::get_string('last_name') == '') {
        $errors['last_name'] = 'Last name needs a value';
    }else {
        $last_name_unstripped = Input::get('last_name');
    }

    if (Input::get_string('email') == '') {
        $errors['email'] = 'Email name needs a value';
    }else if (filter_var(Input::get('email'), FILTER_VALIDATE_EMAIL) == false) {
        $errors['email'] = 'Email was not a valid email, example@example.example';
    } else{
        $email_unstripped = Input::get('email');
    }

    if (Input::get_string('password') == '') {
        $errors['password'] = 'Password needs a value';
    }else {
        $password_unstripped = Input::get('password');
    }

    if (Input::get_string('ver_password') == '') {
      $errors['ver_password'] = 'Password needs a value';
    }else {
        $ver_password = Input::get('ver_password');
    }

    if (isset($password_unstripped) != false &&
    isset($ver_password) != false) {
        if ($password_unstripped == $ver_password) {
            $password = Input::escape($password_unstripped);
        }else{
        $errors['wrongpass'] = "Password's did not match.";
        }
    }


    if (isset($password)) {
        $password = password_hash($password,PASSWORD_DEFAULT);
    }

    if (Input::input_not_empty($require) && empty($errors)) {
      $newUserProfile = new User();
      $newUserProfile->first_name = Input::escape($first_name_unstripped);
      $newUserProfile->last_name = Input::escape($last_name_unstripped);
      $newUserProfile->email = Input::escape($email_unstripped);
      $newUserProfile->password = $password;
      try {
          $newUserProfile->save();
      } catch (PDOException $e) {
          $errors['emailUsed'] = "The email was already used.";
      }
    }

    if (Input::has('submit_form')
     && empty($errors)) {
        header('Location: /signin');
        die();
    }
}
?>

<?php require_once __DIR__ .'/../../views/partials/header.php';  ?>


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




<?php require_once __DIR__ .'/../../views/partials/footer.php';  ?>
