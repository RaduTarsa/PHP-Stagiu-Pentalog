<?php

class Database
{

    private static ?PDO $instance = null;

    public static function getInstance()
    {
        $host = "localhost";
        $database = "tema2";
        $username = "root";
        $password = "";

        if(is_null(self::$instance))
        {
            self::$instance = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        }

        return self::$instance;
    }

}

?>
