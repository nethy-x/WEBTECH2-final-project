<?php
require_once(__DIR__ . "/../classes/controllers/TestController.php");
require_once(__DIR__ . "/../classes/controllers/TestLogsController.php");

session_start();

if (isset($_SESSION['code'])) {
    $test_code = $_SESSION['code'];
    $testController = new TestController();
    $testLogsController = new TestLogsController();
    $test_id = $testController->getIdByCode($test_code);
    $tracker = $testLogsController->getAllByTestId($test_id,"odisiel");
    $response = array("error" => false, "test" => $tracker);
    echo json_encode($response);
} else {
    $response = array("error" => true, "message" => "Code not set");
    echo json_encode($response);
}