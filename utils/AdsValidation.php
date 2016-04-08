<?php



class AdsValidation extends Validation
{
	public static function errors()
	{
		if( !self::isString(Input::get('title'))) {
			self::$errors['title'] = 'Please enter a title';
		}
		elseif (!self::areLetters(Input::get('title'))) {
			self::$errors['title'] = 'Title needs to proper characters';
		}

		// if ( !self::isString(Input::get('category'))) {
		// 	self::$errors['category'] = ''
		// }

		if ( !self::isString(Input::get('description'))) {
			self::$errors['description'] = 'Please enter a description';
		}
		elseif (!self::areLetters(Input::get('description'))) {
			self::$errors['description'] = 'Please enter appropriate description.';
		}

		return self::$errors;
	}
}
