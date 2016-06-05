<?php
require '../prime.php';

function validateInput() {
    $errors = [];
    if (Input::get('email', '') == '') {
        $errors['errors_email'] = 'Email can not be empty.';
}
    if (Input::get('password', '') == '') {
        $errors['errors_password'] = 'Password can not be empty.';
    }

    return $errors;
}

$user = new User();
$errors = validateInput();
if (empty($errors)) {
    $email = Input::get_string('email');
    $password = Input::get_string('password');

    $user =  User::find($email);
    if (! is_null($user)) {
        if (password_verify($password,$user->password)) {
            session_start();
            $_SESSION['user_info'] = $user;
        } else {
          $errors['errors_wronginfo'] = "Email or Password was incorrect.";
        }
    } else {
        $errors['errors_wronginfo'] = "Email or Password was incorrect.";
    }
}

header('Content-type: application/json');
echo json_encode(array_merge($_REQUEST, ['user' => $user, 'errors' => $errors]));
?>
