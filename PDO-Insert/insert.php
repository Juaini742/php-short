<?php

namespace Insert;

require_once __DIR__  . "/../PDO-connection/connection.php";

use Connection\Database;

class Insert
{
    private $connection;

    public function __construct()
    {
        $this->connection = (new Database())->getConnection();
    }

    public function insert(): void
    {
        $username = "John";
        $password = password_hash("123", PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $password);
        $result = $statement->execute();

        if (!$result) {
            echo "ERROR: " . implode(", ", $statement->errorInfo());
        } else {
            echo "Adding new data successfully...";
        }
    }
}

(new Insert)->insert();
