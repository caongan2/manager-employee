<?php


namespace Controller;


use Model\DBConnection;
use Model\EmployeeDB;
use Model\Employees;

class EmployeeController
{
    public EmployeeDB $employeeDB;
    public function __construct()
    {
//        $connection = new DBConnection();
        $this->employeeDB = new EmployeeDB();
    }

    public function getAll()
    {
        $result = $this->employeeDB->getAllEmployee();
        include_once "view/list.php";
    }

    public function detailsEmployee()
    {
        $id = $_REQUEST['id'];
        $employees = $this->employeeDB->detailsEmployee($id);
        include_once "view/details.php";
    }

    public function error()
    {
        $errors = [];
        $fields = ['name', 'age', 'address', 'numberPhone'];
        foreach ($fields as $field) {
            if (empty($_POST[$field])) {
                $errors[$field] = 'Input information';
            }
        }
        return $errors;
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            include "view/add.php";
        } else {
            $errors = $this->error();
            if (empty($errors)){
                $name = $_POST['name'];
                $age = $_POST['age'];
                $address = $_POST['address'];
                $numberPhone = $_POST['numberPhone'];
                $department = $_POST['department'];
                $location = $_POST['location'];
                $degree = $_POST['degree'];
                $target_dir = "view/uploads/";
                $target_file = $target_dir . basename($_FILES['fileUpload']['name']);
                move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file);
                $image = $_FILES['fileUpload']['name'];
                $employee = new Employees($name, $age, $address, $numberPhone, $department, $location, $degree, $image);
                $this->employeeDB->addEmployee($employee);
                header("location:home.php?page=list");
            } else {
                include_once "view/add.php";
            }
        }
    }

    public function editEmployee()
    {
        $id = $_REQUEST['id'];
        $employees = $this->employeeDB->detailsEmployee($id);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once "view/update.php";
        } else {
            $errors = $this->error();
            if (empty($errors)) {
                $id = $_REQUEST['id'];
                $name = $_POST['name'];
                $age = $_POST['age'];
                $address = $_POST['address'];
                $numberPhone = $_POST['numberPhone'];
                $department = $_POST['department'];
                $location = $_POST['location'];
                $degree = $_POST['degree'];
                $target_dir = "view/uploads/";
                $target_file = $target_dir . basename($_FILES['fileUpload']['name']);
                move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file);
                $image = $_FILES['fileUpload']['name'];

                $employees = new Employees($name, $age, $address, $numberPhone, $department, $location, $degree, $image);
                $image2 = $this->employeeDB->getImage($id);
                unlink($target_dir.$image2);
                $this->employeeDB->updateEmployee($id, $employees);
                header("location: home.php?page=list");
            } else {
                include_once "view/update.php";
            }
        }
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        $this->employeeDB->deteleEmployeeById($id);
        header("location:home.php?page=list");
    }

    public function search($name)
    {
        if (empty($name)) {
            $result = $this->employeeDB->getAllEmployee();
            include_once "view/search_employee.php";
        } else {
            $result = $this->employeeDB->searchEmployee($name);
            include_once "view/search_employee.php";
        }
    }
}