<?php


namespace Model;


use PDO;

class EmployeeDB
{
    /**
     * @var DBConnection
     */
    public DBConnection $connection;

    /**
     * @var string
     */
    public string $table;

    /**
     *
     */
    public function __construct()
    {
        $this->connection = new DBConnection();
        $this->table = 'Employees';
    }

    /**
     * @param object $employee
     * @return void
     */
    public function addEmployee(object $employee)
    {
        $sql = "INSERT INTO $this->table(`Name`, `Age`, `Address`, `NumberPhone`, `id_department`, `id_location`, `id_degree`, `image`) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->sqlPrepare($sql);
        $stmt->bindParam(1, $employee->getName());
        $stmt->bindParam(2, $employee->getAge());
        $stmt->bindParam(3, $employee->getAddress());
        $stmt->bindParam(4, $employee->getnumberPhone());
        $stmt->bindParam(5, $employee->getDepartment());
        $stmt->bindParam(6, $employee->getLocation());
        $stmt->bindParam(7, $employee->getDegree());
        $stmt->bindParam(8, $employee->getImage());
        $stmt->execute();
    }

    /**
     * @return array|false
     */
    public function getAllEmployee()
    {
        $sql = "SELECT * FROM $this->table ORDER BY `Name` ASC ";
        $stmt = $this->connection->connect()->query($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $result = $stmt->fetchAll();
        return $result;
    }

    /**
     * @param $id
     * @return array
     */
    public function detailsEmployee($id): array
    {
        $sql = "SELECT * FROM $this->table WHERE id_employee=".$id;
        $stmt = $this->sqlPrepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $row) {
            $employee = new Employees($row['Name'], $row['Age'], $row['Address'], $row['NumberPhone'], $row['id_department'], $row['id_location'], $row['id_degree'], $row['image']);
            $employee->setId($row['id_employee']);
            $employees[] = $employee;
        }
        return $employees;
    }

    /**
     * @param $id
     * @param $employee
     * @return bool
     */
    public function updateEmployee($id, $employee)
    {
        $sql = "UPDATE $this->table SET `Name` = ?, Age = ?, Address = ?, NumberPhone = ?, id_department =?, id_location = ?, id_degree = ?, image = ? WHERE  id_employee =?";
        $stmt = $this->sqlPrepare($sql);
        $stmt->bindParam(1, $employee->getName());
        $stmt->bindParam(2, $employee->getAge());
        $stmt->bindParam(3, $employee->getAddress());
        $stmt->bindParam(4, $employee->getnumberPhone());
        $stmt->bindParam(5, $employee->getDepartment());
        $stmt->bindParam(6, $employee->getLocation());
        $stmt->bindParam(7, $employee->getDegree());
        $stmt->bindParam(8, $employee->getImage());
        $stmt->bindParam(9, $id);
        return $stmt->execute();
    }

    /**
     * @param $id
     * @return void
     */
    public function deteleEmployeeById($id)
    {

        $sql = "DELETE FROM $this->table WHERE id_employee=".$id;
        $stmt = $this->connection->connect()->query($sql);
        $stmt->execute();
    }

    /**
     * @param $name
     * @return array
     */
    public function searchEmployee($name)
    {
        $employees = [];
        $sql = "SELECT * FROM $this->table WHERE `Name` LIKE :text";
        $stmt = $this->sqlPrepare($sql);
        $txt = '%' . $name . '%';
        $stmt->bindParam(":text", $txt);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $row) {
            $employee = new Employees($row['Name'], $row['Age'], $row['Address'], $row['NumberPhone'], $row['id_department'], $row['id_location'], $row['id_degree'], $row['image']);
            $employee->setName($row['Name']);
            $employee->setId($row['id_employee']);
            $employees[] = $employee;
        }
        return $employees;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getImage($id)
    {
        $sql = "SELECT image FROM Employees WHERE id_employee =".$id;
        $stmt = $this->sqlPrepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result[0]['image'];
    }

    /**
     * @param $sql
     * @return false|\PDOStatement
     */
    public function sqlPrepare($sql)
    {
        return $this->connection->connect()->prepare($sql);
    }


}