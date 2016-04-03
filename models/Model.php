<?php

// $user = new User();
// $user->username = 'john';
// echo $user->picture;
// echo $user->username;
abstract class Model
{
    /** @var array Column names of the table associated with model */
    protected $columns = [];
    /** @var PDO|null Connection to the database */
    protected static $dbc;
    /** @var array Database values for a single record. Array keys should be column names in the DB */
    protected $attributes = [];
    /**
     * Constructor
     *
     * An instance of a class derived from Model represents a single record in the database.
     *
     * @param array $attributes Optional array of database values to initialize the model record with
     */
    public function __construct(array $attributes = array('id' => null))
    {
        self::dbConnect();
        $this->attributes = $attributes;
    }
    /**
     * Connect to the DB
     *
     * This method should be called at the beginning of any function that needs to communicate with the database
     */
    protected static function dbConnect()
    {
        if (!self::$dbc) {
            self::$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
            DB_USER,DB_PASSWORD,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ]);
        }
    }
    /**
     * Get a value from attributes based on its name
     *
     * @param string $name key for attributes array
     *
     * @return mixed|null value from the attributes array or null if it is undefined
     */
    public function __get($name)
    {
        return isset($this->attributes[$name]) ? $this->attributes[$name] : null;
    }
    /**
     * Set a new value for a key in attributes
     *
     * @param string $name  key for attributes array
     * @param mixed  $value value to be saved in attributes array
     */
    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }
    /** Store the object in the database */
    public function save()
    {
        if (count($this->attributes) < count($this->columns)) {
            $missing = array_diff($this->columns, array_keys($this->attributes));
            throw new InvalidArgumentException(
                "The following values are missing: " . implode(', ', $missing)
            );
        }
        $extra = array_diff(array_keys($this->attributes), $this->columns);
        if (!empty($extra)) {
            throw new InvalidArgumentException(
                "The following invalid keys were found: " . implode(', ', $extra)
            );
        }
        if (!is_null($this->attributes['id'])) {
            $this->update();
        } else {
            $this->insert();
        }
    }
    /**
     * Insert new entry into database
     *
     * NOTE: Because this method is abstract, any child class MUST have it defined.
     */
    protected abstract function insert();
    /**
     * Update existing entry in database
     *
     * NOTE: Because this method is abstract, any child class MUST have it defined.
     */
    protected abstract function update();
}
