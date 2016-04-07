<?php
require_once __DIR__ . '/../../prime.php';


UserValidation::errors();
    

    if (Input::input_not_empty($require) && empty($errors)) {
      $newUserProfile = new User();
      $newUserProfile->first_name = ($first_name_unstripped);
      $newUserProfile->last_name = ($last_name_unstripped);
      $newUserProfile->email = ($email_unstripped);
      $newUserProfile->password = $password;

if(Input::has('submit_form') && empty($errors)) {
    header('Location: /signin');
    die();
    }
}
?>

<?php require_once __DIR__ .'/../../views/partials/header.php';  ?>


    <form class=""  method="post">

        <div class="">
            <label for="first_name">First Name:</label>
            <input id="first_name" type="text" name="first_name" value="<?= Output::escape('first_name'); ?>">

            <?php if (isset($errors['first_name'])): ?>
                    <span> <?= $errors['first_name'] ?></span>
            <?php endif; ?>

        </div>
        <div class="">
            <label for="last_name">Last Name:</label>
            <input id="last_name" type="text" name="last_name" value="<?= Output::escape('last_name'); ?>">
            <?php if (isset($errors['last_name'])): ?>
                    <span> <?= $errors['last_name'] ?></span>
            <?php endif; ?>
        </div>
        </div>
        <div class="">
            <label for="email">Email:</label>
            <input id="email" type="text" name="email" value="<?= Output::escape('email'); ?>">

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
