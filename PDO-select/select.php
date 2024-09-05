<?php

namespace Select;

use Connection\Database;
use PDO;
use PDOException;

require_once __DIR__ . "/../PDO-connection/connection.php";

class Select
{
    private $connection;


    function __construct()
    {
        $this->connection = (new Database)->getConnection();
    }

    public function select()
    {
        try {
            $sql = "SELECT * FROM users";
            $statement = $this->connection->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $error) {
            echo "Something went error: " . $error->getMessage();
        }
    }
}

$select = (new Select())->select();
if ($select) {
    var_dump($select);
}
