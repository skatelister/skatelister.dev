<?php

// require_once '../models/Model.php';
// require_once '../models/Users.php';

class Ad extends Model {

	protected static $table = 'items';

	protected $columns = [
		'id',
		'title',
		'date_posted',
		'category',
		'description',
		'image',
		'user_id',
		'views'
	];


	protected function insert () {

		$insert = "INSERT INTO items (title, date_posted, category, description, image, user_id, views)
					      VALUES (:title, :date_posted, :category, :description, :image, :user_id, :views)";
		$statement = self::$dbc->prepare($insert);
		unset($this->attributes['id']);
		foreach($this->attributes as $key => $value) {
			$statement->bindValue(":$key", $value, PDO::PARAM_STR);
		}
		$statement->execute();
		$this->attributes['id'] = self::$dbc->lastInsertId();
	}

	protected function update(){
		$update = "UPDATE items SET title = :title, category = :category,
									description = :description, image = :image,
									date_posted = :date_posted, user_id = :user_id,
									views = :views
									WHERE id = :id";
		$statement = self::$dbc->prepare($update);
		// $statment->bindValue(':id',$id, PDO::PARAM_INT);
		foreach( $this->attributes as $key => $value) {
			$statement->bindValue(":$key", $value, PDO::PARAM_STR);
		}
		$statement->execute();
	}

	public static function takeDown($id) {
		$query = "UPDATE items SET availale = :available WHERE id = :id";
		$statement = self::$dbc->prepare($query);
		$statement->bindParam(':available', 0, PDO::PARAM_INT);
		$statement->bindParam(':id', $id, PDO::PARAM_INT);
		$statement->execute();
	}

	public static function reshow($id) {
		$query = "UPDATE items SET available = :available WHERE id = :id";
		$statement = self::$dbc->prepare($query);
		$statememt->bindParam(':available', 1, PDO::PARAM_INT);
		$statement->execute();
	}


	public static function find($id) {
		self::dbConnect();
		$statement = self::$dbc->prepare(
			"SELECT title, date_posted, category, description, image, available
			 FROM items AS i
			   JOIN users AS u
			 ON user_id = u.id
			 WHERE user_id = :id;");

		$statement->bindValue(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchALL();
		$items = [];
		foreach ($result as $item) {
	 		$items[] = new Ad($item);
		}
		return $items;
        // Why do we need this check??
        // $instance = null;
        // if ($result) {
        //     $instance = new Ad($result);
        // }
		//
        // return $instance;
	}

	public static function find_total_posts($id) {
		self::dbConnect();
		$statement = self::$dbc->prepare(
			"SELECT count(*)
			 FROM items AS i
			   JOIN users AS u
			 ON user_id = u.id
			 WHERE user_id = :id;");

		$statement->bindValue(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetchColumn();
		return $result;
        // Why do we need this check??
        // $instance = null;
        // if ($result) {
        //     $instance = new Ad($result);
        // }
		//
        // return $instance;
	}

	public static function paginate($id, $limit, $offset) {
		self::dbConnect();
		$statement = self::$dbc->prepare(
			"SELECT i.id as item_id, title, date_posted, category, description, image, available
			 FROM items AS i
			   JOIN users AS u
			 ON user_id = u.id
			 WHERE user_id = :id  LIMIT :LIMIT OFFSET :OFFSET;");

		$statement->bindValue(':id', $id, PDO::PARAM_STR);
		$statement->bindValue(':LIMIT', $limit, PDO::PARAM_INT);
		$statement->bindValue(':OFFSET', $offset, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll();
		$items = [];
		foreach ($result as $item) {
	 		$items[] = new Ad($item);
		}
		return $items;
        // Why do we need this check??
        // $instance = null;
        // if ($result) {
        //     $instance = new Ad($result);
        // }
		//
        // return $instance;
	}

	public static function find_current_ad($id)
    {
    	//
        self::dbConnect();
        $statement = self::$dbc->prepare('SELECT * FROM items WHERE id = :id');
        $statement->bindValue(':id', $id, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch();
        // The following code will set the attributes on the calling object based on the result variable's contents
        $instance = null;
        if ($result) {
            $instance = new Ad($result);
        }
        return $instance;
    }

	public static function all() {
		self::dbConnect();
		$statement = self::$dbc->prepare('SELECT * FROM items');
		$statement->execute();
		$results  = $statement->fetchAll();
		$ads = [];
		foreach($results as $row) {
			$ads[] = new Ad($row);
		}
		return $ads;
	}

	public static function showNewest() {
		self::dbConnect();
		$limit = 12;
		$statement = self::$dbc->prepare("SELECT * FROM items WHERE available = 1 ORDER BY date_posted DESC LIMIT :limit");
		$statement->bindValue(":limit", $limit, PDO::PARAM_INT);
		$statement->execute();

		return $statement->fetchAll();
	}

}
