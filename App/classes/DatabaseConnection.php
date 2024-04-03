<?php

namespace App\classes;

use PDO;

// Подключение к БД.
class DatabaseConnection
{
    private static $instance;
    private $pdo;

    private function __construct($host, $dbname, $username, $password)
    {
        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    private function __clone()
    {
    }


    public static function getlnstance($host, $dbname, $username, $password)
    {
        if (empty(self::$instance)) self::$instance = new DatabaseConnection($host, $dbname, $username, $password);
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
