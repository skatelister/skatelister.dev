<?php

require_once '../utils/Model.php';
require_once '../utils/Users.php';

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
			 ON user_id = u.id
			 WHERE user_id = :id;");

		$statement->bindValue(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch();

        // Why do we need this check??
        $instance = null;
        if ($result) {
            $instance = new Ad($result);
        }

        return $instance;
	}

	public static function all() {
		self::dbConnect();
		$statemet = self::$dbc
	}
}















