<?php


namespace Model;


use PDO;
use PDOException;

class DBConnection
{
    private $dsn;
    private $username;
    private $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=employee_manager;charset=utf8";
        $this->username = "root";
        $this->password = "123456@Abc";
    }

    public function connect(): PDO
    {
        try {
            return new PDO($this->dsn, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
            die();
         }
    }
}
//
//
//$db = new DBConnection();
//$db->connect();