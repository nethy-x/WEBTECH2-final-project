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

    public function updateTracker($student_id, $test_id, $tracker)
    {
        $stm = $this->conn->prepare("UPDATE test_logs SET tracker=:tracker WHERE student_id=:student_id AND test_id = :test_id");

        try {
            $stm->bindParam(":student_id", $student_id, PDO::PARAM_INT);
            $stm->bindParam(":test_id", $test_id, PDO::PARAM_INT);
            $stm->bindParam(":tracker", $tracker);
            $stm->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    public function updateSent($student_id, $test_id, $sent)
    {
        $stm = $this->conn->prepare("UPDATE test_logs SET sent=:sent WHERE student_id=:student_id AND test_id = :test_id");
        try {
            $stm->bindParam(":student_id", $student_id, PDO::PARAM_INT);
            $stm->bindParam(":test_id", $test_id, PDO::PARAM_INT);
            $stm->bindParam(":sent", $sent);
            $stm->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function getAllByTestId($test_id, $tracker)
    {
        $stm = $this->conn->prepare("SELECT * FROM test_logs WHERE test_id=:test_id and tracker=:tracker and sent='false'");

        $stm->bindParam(":test_id", $test_id, PDO::PARAM_INT);

        $stm->bindParam(":tracker", $tracker);
        $stm->execute();
        $result = $stm->fetchAll();
        return ($result == false ? false : $result);
    }

    public function getTestDetail($test_id)
    {
        $stm = $this->conn->prepare("SELECT * FROM test_logs WHERE test_id=:test_id");

        try {
            $stm->bindParam(":test_id", $test_id);
            $stm->execute();
            $result = $stm->fetchAll();
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
