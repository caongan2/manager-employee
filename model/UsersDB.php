<?php


namespace Model;


class UsersDB
{
    public $connection;
    public function __construct()
    {
        $this->connection = new  DBConnection();
    }

    public function regesterUser(object $users)
    {
        $sql = "INSERT INTO Users(`username`, `password`) VALUES (?,?)";
        $stmt = $this->connection->connect()->prepare($sql);
        $stmt->bindParam(1, $users->getUsername());
        $stmt->bindParam(2, $users->getPassword());
        $stmt->execute();
    }

}