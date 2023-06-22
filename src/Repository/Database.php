<?php

namespace App\Repository;

class Database {
    
    public static function getConnection() {
        return new \PDO("mysql:host=localhost;dbname=symfony_auth", "root", "1234");
    }
}