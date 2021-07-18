<?php

namespace Database;

use PDO;

class DBConnection {

    private $dbname;
    private $hostname;
    private $username;
    private $password;

    public function __construct(string $dbname, string $hostname, string $username, string $password) {
        $this->dbname = $dbname;
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
    }

    public function getPDO(): PDO {

        return $this->pdo ?? new PDO("mysql:dbname={$this->dbname};host={$this->hostname}",
         $this->username, $this->password, [
             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
             PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8'
         ]);
    }
}