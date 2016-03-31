<?php
require_once '../skateConfig.php';
require_once '../utils/Users.php';
require_once '../utils/Input.php';
var_dump($_POST);
$errors = [];
var_dump($errors);
$require = ['first_name','last_name','email','password'];
if (Input::has('first_name')
    && Input::has('last_name')
    && Input::has('email')
    && Input::has('password')
    && Input::has('ver_password')) {
        $firstName = trim(Input::get('first_name'));
        $lastName = trim(Input::get('last_name'));
        $email = trim(Input::get('email'));
        if (Input::get('password') == Input::get('ver_password')) {
            $password = trim(Input::get('password'));
        }
        if ($firstName =='') {
            $errors['firstName'] = 'First name needs a value';
        }
        if ($lastName =='') {
            $errors['lastName'] = 'Last name needs a value';
        }
        if ($email =='') {
            $errors['email'] = 'Email name needs a value';
        }
        if ($password =='') {
            $errors['password'] = 'Password name needs a value';
        }

        $password = sha1($password);
        var_dump($firstName);
        $newUserProfile = new User();
        $newUserProfile->first_name = $firstName;
        $newUserProfile->last_name = $lastName;
        $newUserProfile->email = $email;
        $newUserProfile->user_pass = $password;
        try {
            $newUserProfile->save();
        } catch (PDOException $e) {
            $errors['emailUsed'] = "The email was already used.";
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

                        <?php if (isset($errors['firstName'])): ?>
                                <p> <?= $errors['firstName'] ?></p>
                        <?php endif; ?>

                    </div>
                    <div class="">
                        <label for="last_name">Last Name:</label>
                        <input id="last_name" type="text" name="last_name">
                        <?php if (isset($errors['lastName'])): ?>
                                <p> <?= $errors['lastName'] ?></p>
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
                        <button type="submit">Submit Form</button>
                </form>



        <script src="/js/jquery-1.12.0.js"></script>
        <script src="/js/"></script>
    </body>
</html>
