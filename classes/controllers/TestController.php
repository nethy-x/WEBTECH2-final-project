<?php
require_once(__DIR__ . "/../helpers/Database.php");

class TestController
{
    private ?PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->createConnection();
    }

    public function insertTest($professor_id, $code, $test_json, $time_limit)
    {
        $stm = $this->conn->prepare("INSERT INTO tests (professor_id, code, test_json, time_limit) 
                                            VALUES (:professor_id, :code, :test_json, :time_limit)");

        try {
            $stm->bindParam(":professor_id", $professor_id, PDO::PARAM_INT);
            $stm->bindParam(":code", $code);
            $stm->bindParam(":test_json", $test_json);
            $stm->bindParam(":time_limit", $time_limit);

            $stm->execute();
            return $this->conn->lastInsertId();
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
}