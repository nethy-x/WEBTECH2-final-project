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
        $response = array("error" => true, "message" => "Odhláste sa a prihláste sa");
        echo json_encode($response);
        die();
    }
    $testController = new TestController();
    
    $time_limit = $data->test->time_limit;
    unset($data->test->time_limit);

    $test_id = $testController->insertTest($professor_id, $test_code, $test_json, $time_limit, "inactive");
    if($test_id == false){
        $response = array("error" => true, "message" => "Chyba počas vytvárania testu");
        echo json_encode($response);
        die();
    }

    $response = array("error" => false, "message" => "Test s kódom $test_code bol úspešne vytvorený");
    echo json_encode($response);
}else{
    $response = array("error" => true, "message" => "Odhláste sa a prihláste sa");
    echo json_encode($response);
}
