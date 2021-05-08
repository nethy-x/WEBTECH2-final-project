<?php
require_once (__DIR__. "/../helpers/Database.php");

class TestController
{
    private ?PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->createConnection();
    }

    public function insertTest($professor_id, $code, $test_json){
        $stm = $this->conn->prepare("INSERT INTO tests (professor_id, code, test_json) 
                                            VALUES (:professor_id, :code, :test_json)");

        try{
        $stm->bindParam(":professor_id", $professor_id, PDO::PARAM_INT);
        $stm->bindParam(":code", $code);
        $stm->bindParam(":test_json", $test_json);

        $stm->execute();
        return $this->conn->lastInsertId();
        }catch (Exception $e){
            return false;
        }
    }
}