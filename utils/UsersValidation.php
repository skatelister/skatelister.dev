<?php

class UserValidation extends Validation
{

	public static function errors()
	{
		if (!self::isString(Input::get('first_name'))) {
			self::$errors['first_name'] = 'Please enter a value';
		}
		elseif (!self::areLetters(Input::get('first_name'))) {
			self::$errors['first_name'] = 'Only letters for firstname';
		}

		if (!self::isString(Input::get('last_name'))) {
			self::$errors['last_name'] = 'Please enter a value';
		} elseif (!self::areLetters(Input::get('last_name'))) {
			self::$errors['last_name'] = 'Only letters for lastname';
		}

		if (!self::isString(Input::get('email'))) {
			self::$errors['email'] = 'Please enter a value';
		}
		elseif (!self::isEmail(Input::get('email'))) {
			self::$errors['email'] = 'Email was not a valid email, example@example.example';
		}


		if (!self::isString(Input::get('password'))) {
			self::$errors['password'] = 'Please enter a value';
		}
		elseif (!self::areLetters(Input::get('password'))) {
			self::$errors['password'] = 'Please enter an alpha-numeric password';
		}

		if(!self::isString(Input::get('ver_password'))) {
			self::$errors['ver_password'] = 'Please enter a valid confirmation password';
		}
		elseif(Input::get('ver_password') !== Input::get('password')) {
			self::$errors['ver_password'] = 'Passwords do not match';
		}
		return self::$errors;
	}

	public static function updateUser()
	{
		if (input::get('first_name') != '') {
		  self::$data_saved['first_name'] = 'First name has been saved.';
	  }

		if (Input::get('last_name') != '') {
		  self::$data_saved['last_name'] = 'Last name has been saved.';
		}

		if (Input::get('password') != ''
		 || Input::get('ver_password') != '') {
		        if (Input::get('password') === Input::get('ver_password')) {
		            self::$data_saved['password'] = 'Password name has been saved.';
		        }
		}
		return self::$data_saved;
	}

	public static function checkForChanges()
	{
		if (Input::get('first_name') == ''
		  && Input::get('last_name') == ''
		  && Input::get('password') == ''
		  && Input::get('ver_password') == ''
		  && Input::has('submit_form')) {
		self::$errors['not_saved'] = 'No changes where made';
		}
		return self::$errors;
	}
}
