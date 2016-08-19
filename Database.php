<?php

/**
 * Created by PhpStorm.
 * User: Kevynashinski
 * Date: 6/13/2016
 * Time: 1:11 PM
 */
class Database
{
    private static $cont = null;

    public function __construct()
    {
    }

    public static function connect()
    {
        require_once 'config.php';

        // One connection through whole application
        if (null == self::$cont) {
            try {
                self::$cont = new PDO("mysql:host=" . HOST . ";" . "dbname=" . DATABASE, UNAME, PASS);
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
