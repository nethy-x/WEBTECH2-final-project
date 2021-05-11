<?php
require_once(__DIR__ . "/../helpers/Database.php");

class StudentController
{
    private ?PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->createConnection();
    }

    public function getNameById($id)
    {
        $stm = $this->conn->prepare("SELECT name,surname FROM student WHERE id=:id");

        $stm->bindParam(":id", $id);
        $stm->execute();
        $result = $stm->fetch();
        return ($result == false ? false : $result);
    }
}