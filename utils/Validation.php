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
}
