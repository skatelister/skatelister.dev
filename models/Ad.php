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

	public function insert () {
		
		$insert = "INSERT INTO items (title, available, date_posted, category, description, image, user_id)
					      VALUES (:title, :available, :date_posted, :category, :description, :image, :user_id)";
		$statement = self::$dbc->prepare($insert);
		// attribute['id'] is set from Model class __construct() !!
		unset($this->attributes['id']);
		foreach($this->attributes as $key => $value) {
			$statement->bindValue(":$key", $value, PDO::PARAM_STR);
			var_dump($statement);
		}
		$statement->execute();
		$this->attributes['id'] = self::$dbc->lastInsertId();
	}

	protected function update(){
		$update = "UPDATE items SET title = :title, category = :category, 
									description = :description, image = :image";
		$statement = self::$dbc->prepare($update);
		foreach( $this->attribute as $key => $value) {
			$statement->bindParam(":$key", $value, PDO::PARAM_STR);
		}
		$statement->execute();
	}

	// protected function takeDown() {
	// 	$query = "UPDATE items SET availale = :available WHERE id = :id";
	// 	$statement = self::$dbc->prepare($query);
	// 	$statement->bindParam(':available', 0, PDO::PARAM_INT);
	// 	$statement->execute();
	// }

	// protected function reshow() {
	// 	$query = "UPDATE items SET available = :available WHERE id = :id";
	// 	$statement = self::$dbc->prepare($query);
	// 	$statememt->bindParam(':available', 1, PDO::PARAM_INT);
	// 	$statement->execute();
	// }


	public static function find($id) {
		// self::dbConnect();
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
		// self::dbConnect();
		$statement = self::$dbc->prepare('SELECT * FROM items');
		$statement->execute();
		$results  = $statement->fetchAll();
		$ads = [];
		foreach($results as $row) {
			$ads[] = new Ad($row);
		}
		return $ads;
	}

}


