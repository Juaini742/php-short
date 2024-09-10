<?php

namespace SelectById;

use Connection\Database;
use PDO;
use PDOException;

require_once __DIR__ . "/../PDO-connection/connection.php";

class SelectById
{
    private $connection;
    function __construct()
    {
        $this->connection = (new Database)->getConnection();
    }

    function selectById(string $table, int $id)
    {
        try {
            $sql = "SELECT * FROM $table WHERE id = :id";
            $statement = $this->connection->prepare($sql);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $error) {
            echo "ERROR while getting data from database: " . $error->getMessage();
            return null;
        }
    }
}

$table = 'users';
$id = 18;
$data = (new SelectById)->selectById($table, $id);
var_dump($data);
