<?php

class UsersValidation extends Validation
{

	$require = ['first_name', 'last_name', 'email', 'password', 'ver_password'];

	//extend Validation
	$errors = [];
	UserValidation::errorMessages(); 
	
	public function __construct() {
		if($_POST['submit_form'])
	}

	public static function errorMessages() {

	}

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
}