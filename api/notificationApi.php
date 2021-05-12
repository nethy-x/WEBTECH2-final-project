<?php
require_once(__DIR__ . "/../classes/controllers/TestController.php");
require_once(__DIR__ . "/../classes/controllers/TestLogsController.php");

require_once(__DIR__ . "/../classes/controllers/StudentController.php");

session_start();

if (isset($_SESSION['id'])) {
    $professor_id = $_SESSION['id'];
    $testController = new TestController();
    $testLogsController = new TestLogsController();
    $studentController = new StudentController();

    $test_ids = $testController->getIdCodeByProfessor($professor_id);
    $response = array("error" => false, "test" => array());
    if ($test_ids == false) {
        echo json_encode($response);
        die();
    }

    foreach ($test_ids as $test_id) {
        $trackers = $testLogsController->getAllByTestId($test_id["id"], "odisiel");
        $test_code = $testController->getCodeById($test_id["id"]);
        $test_array = array();
        if ($trackers == false) {
            continue;
        }
        foreach ($trackers as $tracker) {
            if ($tracker != false) {
                $student_id = $tracker["student_id"];
                $student_name = $studentController->getNameById($student_id);
                array_push($test_array, array("id" => $tracker["student_id"], "name" => $student_name["name"] . " " . $student_name["surname"]));
                $testLogsController->updateSent($student_id, $test_id["id"], "true");
            }

        }
        $response["test"][$test_code] = $test_array;
//        $response["test"]["test_code"] = array($test_code => $test_array);
    }

    echo json_encode($response);
} else {
    $response = array("error" => true, "message" => "Code not set");
    echo json_encode($response);
}