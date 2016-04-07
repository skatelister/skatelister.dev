<?php
abstract class Validation
{
	static $errors = [];

	abstract static function errors();

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
}

class UserValidation extends Validation
{

	public function __construct()
	{
		echo 'hello';
	}
	public static function errors()
	{
		if (!self::isString(Input::get('first_name'))) {
			self::$errors['first_name'] = 'Please enter a value';
		} 
		elseif (!self::isAlphaNum(Input::get('first_name'))) {
			self::$errors['first_name'] = 'Only letters for firstname';
		}
		
		if (empty(Input::get_string('last_name'))) {
			self::$errors['last_name'] = 'Please enter a value';
		} elseif (!self::isAlnum(Input::get('last_name'))) {
			self::$errors['last_name'] = 'Only letters for lastname';
		}

		if (! self::isString(Input::get('email'))) {
			self::$errors['email'] = 'Please enter a value';
		}
		elseif (!self::isEmail(Input::get('email'))) {
			self::$errors['email'] = 'Email was not a valid email, example@example.example';
		}
		
		if (empty(Input::get_string('password'))) {
			self::$errors['password'] = 'Please enter a value';
		}
		elseif (self::isAlphaNum(Input::get_string('password'))) {
			self::$errors['password'] = 'Please enter valid';
		}

		return self::$errors;
	}
	
}
