<?php

require_once '../models/Model.php';
require_once '../models/Users.php';

class Ad extends Model {

	protected static $table = 'items';

	protected $columns = [
		'id',
		'title',
		'available',
		'date_posted',
		'category',
		'description',
		'image',
		'user_id'
	];
	protected function update(){

	}

	protected function insert ()
	{
		$insert = "INSERT INTO items (title, available, date_posted, category, description, image, user_id)
					      VALUES (:title, :available, :date_posted, :category, :description, :image, :user_id)";
		$statement->prepare($insert);
		// attribute['id'] is set from Model class __construct() !!
		unset($this->attribute['id']);
		foreach( $this->attributes as $key => $value) {
			$statement->bindValue(":$key", $value, PDO::PARAM_STR);
		}
		$statement->execute();
	}

	public static function find($id) {
		self::dbConnect();
		$statement = self::$dbc->prepare(
			"SELECT title, date_posted, category, description, image
			 FROM items AS i
			   JOIN users AS u
			 ON i.user_id = u.id
			 WHERE user_id = :id;");

		$statement->bindValue(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchAll();

        // The following code will set the attributes on the calling object based on the result variable's contents
        $instance = null;
        if ($result) {
            $instance = new Ad($result);
        }

        return $instance;
	}
}
