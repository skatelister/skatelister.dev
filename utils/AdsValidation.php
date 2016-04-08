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

	public static function savedData(){

		if (input::get_string('update_title') != '') {
		    self::$data_saved['update_title'] = 'Title has been saved.';
		}

		if (Input::get_string('update_category') != '') {
		    self::$data_saved['update_category'] = 'Category has been saved.';
		}

		if (Input::get_string('update_description') != '') {
		    self::$data_saved['update_description'] = 'Description has been saved.';
		}

		if (Input::get_string('update_title') == ''
		  && Input::get_string('update_category') == ''
		  && Input::get_string('update_description') == ''
		  && Input::has('submit_form')) {
		    self::$data_saved['not_saved'] = 'No changes where made';
		}
		return self::$data_saved;
	}
	public static function updateErrors(){

		if (input::get_string('update_title') == '') {
		    $errors['title'] = 'Title needs to be a word.';
		}

		if (Input::get_string('update_description') == '') {
		    $errors['description'] = 'Description needs to be a word.';
		}
	}
}
