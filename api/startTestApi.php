<?php
require_once(__DIR__ . "/../classes/controllers/TestLogsController.php");
require_once(__DIR__ . "/../classes/controllers/TestController.php");

session_start();
$json = file_get_contents('php://input');
$data = json_decode($json);
if (isset($_SESSION['id']) && isset($data) && isset($data->time)) {
    $testLogsController = new TestLogsController();
    $testController = new TestController();


    $testLogsController->updateStart($_SESSION['id'], $testController->getIdByCode($_SESSION['code']), $data->time);

    $response = array("error" => false);
    echo json_encode($response);
} else {
    $response = array("error" => true, "message" => "Code not set or Time not set");
    echo json_encode($response);
}