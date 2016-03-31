<?php
require_once 'Model.php';
class User extends Model
{
    protected static $table = 'users';
    protected $columns = [
        'id',
        'first_name',
        'last_name',
        'email',
        'user_pass',
    ];
    /** Insert a new entry into the database */
    protected function insert()
    {
        $insert = 'INSERT INTO users (first_name, last_name, email, user_pass)
                   VALUES (:first_name, :last_name, :email, :user_pass)';
        $statement = self::$dbc->prepare($insert);
        unset($this->attributes['id']);
        foreach ($this->attributes as $key => $value) {
            $statement->bindValue(":$key", $value, PDO::PARAM_STR);
        }


            $statement->execute();
        
        $this->attributes['id'] = self::$dbc->lastInsertId();
    }
    /** Update existing entry in the database */
    protected function update()
    {
        $update = 'UPDATE users SET first_name = :first_name, last_name = :last_name,
                   email = :email, user_pass = :user_pass WHERE id = :id';
        $statement = self::$dbc->prepare($update);
        foreach ($this->attributes as $key => $value) {
            $statement->bindValue(":$key", $value, PDO::PARAM_STR);
        }

        $statement->execute();
    }
    /**
     * Find a single record in the DB based on its id
     *
     * @param int $id id of the user entry in the database
     *
     * @return User An instance of the User class with attributes array set to values from the database
     */
    public static function find($id)
    {
        // Get connection to the database
        self::dbConnect();
        $statement = self::$dbc->prepare('SELECT * FROM users WHERE id = :id');
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch();
        // The following code will set the attributes on the calling object based on the result variable's contents
        $instance = null;
        if ($result) {
            $instance = new User($result);
        }
        return $instance;
    }
    /**
     * Find all records in a table
     *
     * @return User[] Array of instances of the User class with attributes set to values from database
     */
    public static function all()
    {
        self::dbConnect();
        $statement = self::$dbc->prepare('SELECT * FROM users');
        $statement->execute();
        $results = $statement->fetchAll();
        $users = [];
        foreach ($results as $row) {
            $users[] = new User($row);
        }
        return $users;
    }
    public static function delete($id)
    {
        // Get connection to the database
        self::dbConnect();
        $statement = self::$dbc->prepare('DELETE FROM users WHERE id = :id');
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
}
