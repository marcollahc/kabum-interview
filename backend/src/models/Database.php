<?php
namespace src\Models;

use PDO;

class Database {
    private $connection;

    public function __construct() {
        global $database;

        try {
            $this->connection = new PDO("mysql:dbname={$database->name};host={$database->host}", $database->user, $database->password);
        } catch(PDOException $e) {
            die("Connection failed {$e->getMessage()}");
        }
    }

    public function getConnection():object {
        return $this->connection;
    }
}
