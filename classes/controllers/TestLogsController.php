<?php

date_default_timezone_set('Europe/Bratislava');

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
    public function getTestByStudentTestId($student_id,$test_id)
    {
        $stm = $this->conn->prepare("SELECT test_json FROM test_logs WHERE student_id=:student_id AND test_id=:test_id");

        $stm->bindParam(":student_id", $student_id);
        $stm->bindParam(":test_id", $test_id);
        $stm->execute();
        $result = $stm->fetch();
        return ($result == false ? false : $result["test_json"]);
    }

    public function getTimeByStudentTestId($student_id, $test_id) {
        $stm = $this->conn->prepare("SELECT start, finish FROM test_logs WHERE test_id=:test_id AND student_id=:student_id");

        try {
            $stm->bindParam(":test_id", $test_id);
            $stm->bindParam(":student_id", $student_id);
            $stm->execute();
            $result = $stm->fetch();

            $diff = strtotime($result["finish"]) - strtotime($result["start"]);
            $dt = new DateTime("@$diff");
            return $dt->format('H:i:s');
        } catch (Exception $e) {
            return "00:00:00";
        }
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

    public function updateStart($student_id, $test_id, $time)
    {
        $stm = $this->conn->prepare("UPDATE test_logs SET start=:start, finish=:finish WHERE student_id=:student_id AND test_id = :test_id");
        try {
            $stm->bindParam(":student_id", $student_id, PDO::PARAM_INT);
            $stm->bindParam(":test_id", $test_id, PDO::PARAM_INT);

            $currentDate = date('Y-m-d H:i:s');
            $stm->bindParam(":start", $currentDate);

            $hms = explode(":", $time);
            $h = (int)$hms[0];
            $m = (int)$hms[1];
            $s = (int)$hms[2];
            $finishDate = date('Y-m-d H:i:s', strtotime("+$h hours +$m minutes +$s seconds", strtotime($currentDate)));
            $stm->bindParam(":finish", $finishDate);
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
    public function testStarted($test_id, $student_id)
    {
        $stm = $this->conn->prepare("SELECT start, finish FROM test_logs WHERE test_id=:test_id AND student_id=:student_id");

        try {
            $stm->bindParam(":test_id", $test_id);
            $stm->bindParam(":student_id", $student_id);
            $stm->execute();
            $result = $stm->fetch();
            if (($result["start"] == NULL) || ($result["finish"] == NULL)) {
                return false;
            }

            $stm = $this->conn->prepare("UPDATE test_logs SET start=:start WHERE student_id=:student_id AND test_id = :test_id");

            try {
                $start = date('Y-m-d H:i:s');
                $stm->bindParam(":start", $start);
                $stm->bindParam(":test_id", $test_id);
                $stm->bindParam(":student_id", $student_id);
                $stm->execute();
            } catch (Exception $e) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function compareDates($test_id, $student_id)
    {
        $stm = $this->conn->prepare("SELECT start, finish FROM test_logs WHERE test_id=:test_id AND student_id=:student_id");

        try {
            $stm->bindParam(":test_id", $test_id);
            $stm->bindParam(":student_id", $student_id);
            $stm->execute();
            $result = $stm->fetch();
 
            if($result["start"] > $result["finish"]) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function addTestAndEvaluation($evaluation_sum, $test_json, $student_id, $test_id){
        $stm = $this->conn->prepare("UPDATE test_logs SET test_json=:test_json, evaluation_sum=:evaluation_sum
                                            WHERE student_id=:student_id AND test_id = :test_id");
        try {
            $stm->bindParam(":test_json", $test_json);
            $stm->bindParam(":evaluation_sum", $evaluation_sum, PDO::PARAM_INT);
            $stm->bindParam(":student_id", $student_id, PDO::PARAM_INT);
            $stm->bindParam(":test_id", $test_id, PDO::PARAM_INT);

            $stm->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
