<?php
require_once(__DIR__ . "/../classes/controllers/TestController.php");
require_once(__DIR__ . "/../classes/controllers/TestLogsController.php");

session_start();
$json = file_get_contents('php://input');
$data = json_decode($json);
if (isset($_SESSION['id'])) {
    $student_id = $_SESSION['id'];
    $testController = new TestLogsController();
    $tracker = $testController->getTrackerByStudentId($student_id);
    $key = "state";
    if ($tracker != $data->$key) {
        $tracker = $data->$key;
        if ($testController->updateTracker($student_id, $tracker)) {
            $response = array("error" => false, "state" => $tracker);
            echo json_encode($response);
        } else {
            $response = array("error" => true, "message" => "State not set");
            echo json_encode($response);
        }
    } else {
        $response = array("error" => true, "message" => "State not set");
        echo json_encode($response);
    }

} else {
    $response = array("error" => true, "message" => "State not set");
    echo json_encode($response);
}
