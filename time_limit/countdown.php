<?php
require_once(__DIR__ . "/../classes/controllers/TestController.php");

session_start();

if (isset($_SESSION['code'])) {
    $code = $_SESSION['code'];
    $testController = new TestController();
    $time = $testController->getTime($code);


    set_time_limit(10);
    $response = array("error" => false, "time" => $time);
    echo json_encode($response);
} else {
    $response = array("error" => true, "message" => "Code not set");
    echo json_encode($response);
}

?>