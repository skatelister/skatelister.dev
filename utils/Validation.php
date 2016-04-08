<?php
class Validation
{
	protected static $errors = [];
	protected static $data_saved = [];

	// public function errors();

	public static function has($key)
    {
        if (isset($_REQUEST[$key])){
        	return true;
        }
    }


    public static function get($key, $default = '')
    {
        return (self::has($key)) ? $_REQUEST[$key] : $default;
    }

	public static function areNotEmpty($required)
    {
        foreach ($required as $key) {
            if (!isset($_REQUEST[$key]) || $_REQUEST[$key] == '') {
                return false;
            }
        }
        return true;
    }

    public static function isString($key)
    {
        $value = self::get($key);
        if(is_array($value)  || is_numeric($value)  || is_bool($value) ||
           is_object($value) || is_resource($value) || is_null($value)) {
           return false;
     	}
        return true;
    }

    public static function isNumber($key)
    {
        $value = self::get($key);

        return is_numeric($value);
    }


    public static function isDate($key)
    {
        $date = new DateTime($key);
        return (bool) $date;
    }

    public static function isEmail($value)
    {
    	return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function isAlphaNum($value)
    {
    	return ctype_alnum($value);
    }

    public static function areLetters($value)
    {
    	return ctype_alpha($value);
    }

    public static function hashPassword($key)
    {
    	return password_hash($key, PASSWORD_DEFAULT);
    }

    public static function isCorrectCategory($key)
    {
    	
    }
}
<<<<<<< HEAD

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
}
	
class AdsValidation extends Validation
{
	public static function errors()
	{
		if( !self::isString(Input::get('title'))) {
			self::$errors['title'] = 'Please enter a title';
		}
		elseif ( !self::areLetters(Input::get('title'))) {
			self::$errors['title'] = 'Title needs to proper characters';
		}

		if ( !self::isString(Input::get('category'))) {
			self::$errors['category'] = 'Please enter select a category';
		}
		elseif ( !self::isString(Input::get('category')))

		if ( !self::isString(Input::get('description'))) {
			self::$errors['description'] = 'Please enter a description';
		}
		elseif (!self::areLetters(Input::get('description'))) {
			self::$errors['description'] = 'Please enter appropriate description.';
		}

		return self::$errors;
	}
}
=======
>>>>>>> e842f64fa5f7aa0fefdf1cda036fcae234aa16c5
