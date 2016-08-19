<?php

/**
 * Created by PhpStorm.
 * User: Kevynashinski
 * Date: 6/13/2016
 * Time: 1:11 PM
 */
class Database
{

    private static $dbName = 'androidmastermind';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'kevynashinski';
    private static $dbUserPassword = 'elegant';

    private static $cont = null;

    public function __construct()
    {
    }

    public static function connect()
    {
        // One connection through whole application
        if (null == self::$cont) {
            try {
                self::$cont = new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUsername, self::$dbUserPassword);
                self::$cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }

}

?>
