<?php


namespace App\Core;


use PDO;
use PDOException;

/**
 * Db, connexion à BDD
 */
class Db extends PDO
{

    private static $db;

    private const DBHOST = "localhost";
    private const DBUSER = "two_one_two";
    private const DBPASS = "12";
    private const DBNAME = "demo_poo";


    private function __construct()
    {
        $_dsn = 'mysql:dbname=' . self::DBNAME . ';host' . self::DBHOST;

        try {
            parent::__construct($_dsn, self::DBUSER, self::DBPASS);

            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    
    /**
     * getInstance: retourne une instance de la classe Db
     * represente donc une connexion à notre bdd
     *
     * @return PDO
     */
    public static function getInstance():PDO
    {

        if (!self::$db) {
            self::$db = new self;
        }

        return self::$db;
    }
}
