<?php
require_once(__DIR__ . "/../classes/controllers/TestLogsController.php");
require_once(__DIR__ . "/../classes/controllers/TestController.php");

session_start();

if (isset($_SESSION['id'])) {
    $testLogsController = new TestLogsController();
    $testController = new TestController();

    $testStarted = $testLogsController->testStarted($testController->getIdByCode($_SESSION['code']), $_SESSION['id']);
    //kontrola, ci start je mensi ako finish
    $enoughTime = $testLogsController->compareDates($testController->getIdByCode($_SESSION['code']), $_SESSION['id']);
    if($enoughTime){
        $response = array("error" => false, "testStarted" => $testStarted);
        echo json_encode($response);
    }
    else {
        $response = array("error" => true, "message" => "No time left to write test");
        echo json_encode($response);
    }

} else {
    $response = array("error" => true, "message" => "Code not set or Time not set");
    echo json_encode($response);
}