<?php
require_once(__DIR__ . "/../classes/controllers/TestController.php");

session_start();

if (isset($_SESSION['code'])) {
    $code = $_SESSION['code'];
    $testController = new TestController();
    $test_json = $testController->getByCode($code);

    if($test_json == false){
        $response = array("error" => true, "message" => "Test not found");
        echo json_encode($response);
    }

    $test_json = json_decode($test_json);
<<<<<<< HEAD
    //TODO: prejdi $test_json a vypis otazku na zaklade typu otazky
    //      funkciu pre kazdy typ otazky..
=======

>>>>>>> master

    $response = array("error" => false, "test" => $test_json);

    echo json_encode($response);
} else {
    $response = array("error" => true, "message" => "Code not set");
    echo json_encode($response);
}