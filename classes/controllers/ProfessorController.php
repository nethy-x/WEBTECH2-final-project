<?php
require_once(__DIR__ . "/../helpers/Database.php");

class ProfessorController
{
    private ?PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->createConnection();
    }

    public function getIdByEmail($email)
    {
        $stm = $this->conn->prepare("SELECT id FROM professor WHERE email=:email");

        $stm->bindParam(":email", $email);
        $stm->execute();
        $result = $stm->fetch();
        return ($result == false ? false : $result["id"]);
    }
}