<?php
require_once(__DIR__ . "/../classes/controllers/TestController.php");
require_once(__DIR__ . "/../classes/controllers/ProfessorController.php");

session_start();
$json = file_get_contents('php://input');
$data = json_decode($json);
if (isset($data) && isset($data->test) && isset($_SESSION["username"])) {
    $test_json = json_encode($data->test);
    $test_code = uniqid();
    $email = $_SESSION["username"];

    $professorController = new ProfessorController();
    $professor_id = $professorController->getIdByEmail($email);
    if($professor_id == false){
        $response = array("error" => true, "message" => "Professor not logged in, or wrong id");
        die();
    }

    $testController = new TestController();
    $test_id = $testController->insertTest($professor_id, $test_code, $test_json);
    if($test_id == false){
        $response = array("error" => true, "message" => "Fail during inserting test");
        die();
    }

    $response = array("error" => false, "message" => "Added new test with code $test_code");
    echo json_encode($response);
}else{
    $response = array("error" => true, "message" => "Panic error");
}
