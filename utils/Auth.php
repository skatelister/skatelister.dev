<?php

require_once '../skateConfig.php';

class Auth
{
    protected static $password;
    protected static $dbc;

    protected static function dbConnect()
    {
        if (!self::$dbc) {
            self::$dbc = new PDO('mysql:host=' . DB_host . ';dbname=' . DB_name,
            DB_user,DB_password,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ]);
        }
    }

    public static function attempt($username,$password){
        self::getPassword();
        if ($username == 'Tomas' && password_verify($password, self::$password)) {
            session_start();
            $_SESSION['LOGGED_IN_USER'] = $username;
            return true;
        }else if ($username != '' || $password != ''){
        return false;
        }
    }
    public static function check(){
        return isset($_SESSION['LOGGED_IN_USER']) && $_SESSION['LOGGED_IN_USER'] != '';
    }
    public static function user(){
        return $SESSION['LOGGED_IN_USER'];

    }
    public static function logout(){
        session_start();
        session_unset();
        session_regenerate_id(true);
    }
    public static function getEmail($email){
    self::dbConnect();
    $usersInfo = "SELECT * FROM users WHERE email = :email";
    $statement = self::$dbc->prepare($usersInfo);
    $statment->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $result = $statment->fetch();
    

    }
    public static function setPassword($username,$password){
        $filename = 'password.txt';
        $handle = fopen($filename, 'a');
        fwrite($handle, $username . ',' . $password . PHP_EOL);
        fclose($handle);
    }
}

 ?>
