<?php 

namespace Config;

class Conection
{
    protected static $conection;

    public static function conect()
    {
        self::$conection = new \mysqli("localhost", "root", "", "saep_db");

        return self::$conection;
    }
}