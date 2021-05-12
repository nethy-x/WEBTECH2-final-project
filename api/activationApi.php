<?php
require_once (__DIR__ . "/../classes/controllers/TestController.php");
if(!isset($_GET['code']) || !isset($_GET['status'])){
    $response = array("error" => true, "message" => "Code not set");
    echo json_encode($response);
}else{
    $code = $_GET['code'];
    $status = $_GET['status'];
    $testController = new TestController();
    $testController->toggleActivation($code, $status);

    $response = array("error" => false);
    $response["code"] = $code;
    $response["status"] = $status;
    echo json_encode($response);
}
