<?php


namespace Model;


class Employees
{
    private $id;
    private $name;
    private $age;
    private $address;
    private $numberPhone;
    private $department;
    private $location;
    private $degree;
    private mixed $image;

    public function __construct($name, $age, $address, $numberPhone, $department, $location, $degree, mixed $image)
    {
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
        $this->numberPhone = $numberPhone;
        $this->department = $department;
        $this->location = $location;
        $this->degree = $degree;
        $this->image = $image;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getNumberPhone()
    {
        return $this->numberPhone;
    }

    /**
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return mixed
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @param mixed $numberPhone
     */
    public function setNumberPhone($numberPhone): void
    {
        $this->numberPhone = $numberPhone;
    }

    /**
     * @param mixed $department
     */
    public function setDepartment($department): void
    {
        $this->department = $department;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location): void
    {
        $this->location = $location;
    }

    /**
     * @param mixed $degree
     */
    public function setDegree($degree): void
    {
        $this->degree = $degree;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }




}