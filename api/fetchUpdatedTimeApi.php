<?php
require_once(__DIR__ . "/../classes/controllers/TestController.php");
require_once(__DIR__ . "/../classes/controllers/TestLogsController.php");

session_start();

if (isset($_SESSION['code'])) {
    $code = $_SESSION['code'];
    $testController = new TestController();
    $testLogsController = new TestLogsController();
    $time = $testLogsController->getTimeByStudentTestId($_SESSION['id'], $testController->getIdByCode($_SESSION['code']));

    $response = array("error" => false, "time" => $time);
    echo json_encode($response);
} else {
    $response = array("error" => true, "message" => "Code not set");
    echo json_encode($response);
}