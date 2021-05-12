<?php
require_once(__DIR__ . "/../helpers/Database.php");

class TestController
{
    private ?PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->createConnection();
    }

    public function insertTest($professor_id, $code, $test_json)
    {
        $stm = $this->conn->prepare("INSERT INTO tests (professor_id, code, test_json) 
                                            VALUES (:professor_id, :code, :test_json)");

        try {
            $stm->bindParam(":professor_id", $professor_id, PDO::PARAM_INT);
            $stm->bindParam(":code", $code);
            $stm->bindParam(":test_json", $test_json);

            $stm->execute();
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            return false;
        }
    }

    public function getCodeById($id){
        $stm = $this->conn->prepare("SELECT code FROM tests WHERE id=:id");
        try {
            $stm->bindParam(":id", $id);
            $stm->execute();
            $result = $stm->fetch();
            return ($result == false ? false : $result["code"]);
        } catch (Exception $e) {
            return false;
        }
    }

    public function getByCode($code)
    {
        $stm = $this->conn->prepare("SELECT test_json FROM tests WHERE code=:code");

        try {
            $stm->bindParam(":code", $code);
            $stm->execute();
            $result = $stm->fetch();
            return ($result == false ? false : $result["test_json"]);
        } catch (Exception $e) {
            return false;
        }
    }

    public function getIdByCode($code)
    {
        $stm = $this->conn->prepare("SELECT id FROM tests WHERE code=:code");

        try {
            $stm->bindParam(":code", $code);
            $stm->execute();
            $result = $stm->fetch();
            return ($result == false ? false : $result["id"]);
        } catch (Exception $e) {
            return false;
        }
    }

    public function getIdCodeByProfessor($professor_id)
    {
        $stm = $this->conn->prepare("SELECT * FROM tests WHERE professor_id=:professor_id");

        try {
            $stm->bindParam(":professor_id", $professor_id);
            $stm->execute();
            return $stm->fetchAll();
        } catch (Exception $e) {
            return false;
        }
    }

    public function toggleActivation($code, $status)
    {
        $stm = $this->conn->prepare("UPDATE tests SET status=:status WHERE code=:code");

        try {
            $stm->bindParam(":status", $status);
            $stm->bindParam(":code", $code);
            $stm->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}