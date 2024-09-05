<?php

namespace Connection;

use PDO;
use PDOException;

class Database
{

    private string $host = "localhost";
    private string $port = "3306";
    private string $database = "pdo_connection";
    private string $username = "public";
    private string $password = "";
    private $connection = null;

    public function getConnection(): PDO
    {

        try {
            $this->connection = new PDO("mysql:host=$this->host:$this->port;dbname=$this->database", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Database connection established successfully....";
        } catch (PDOException $error) {
            echo "ERROR while connecting to database: " . $error->getMessage() . PHP_EOL;
        }

        return $this->connection;
    }
}

(new Database)->getConnection();
