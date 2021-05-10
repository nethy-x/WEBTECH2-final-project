<?php


class TestLogsController
{
    private ?PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->createConnection();
    }

    public function getTrackerByStudentId($student_id)
    {
        $stm = $this->conn->prepare("SELECT tracker FROM test_logs WHERE student_id=:student_id");

        $stm->bindParam(":student_id", $student_id);
        $stm->execute();
        $result = $stm->fetch();
        return ($result == false ? false : $result["tracker"]);
    }
    public function updateTracker($student_id,$tracker)
    {
        $stm = $this->conn->prepare("UPDATE test_logs SET tracker=:tracker WHERE student_id=:student_id");

        try {
            $stm->bindParam(":student_id", $student_id, PDO::PARAM_INT);
            $stm->bindParam(":tracker", $tracker);
            $stm->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function getAllByTestId($test_id)
    {
        $stm = $this->conn->prepare("SELECT student_id, tracker FROM test_logs WHERE test_id=:test_id");

        $stm->bindParam(":test_id", $test_id);
        $stm->execute();
        $result = $stm->fetchAll();
        return ($result == false ? false : $result);
    }
}