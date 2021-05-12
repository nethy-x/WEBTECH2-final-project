<?php

require_once(__DIR__ . "/../classes/controllers/TestController.php");
require_once(__DIR__ . "/../classes/controllers/TestLogsController.php");
require_once(__DIR__ . "/../classes/controllers/StudentController.php");


header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header("Connection: keep-alive");


//if (!isset($_SESSION["code"])) {
//    die();
//}

$testController = new TestController();
$testLogsController = new TestLogsController();
$studentController = new StudentController();

$test = "6096ff507e84e";

$log = array();
while (true) {
    $testId = $testController->getIdByCode($test);
    $trackersArray = $testLogsController->getAllByTestId($testId);

    $i = 0;
    $j = 0;
    foreach ($trackersArray as $item) {

        $student = $studentController->getNameById($item["student_id"]);
        $data[$i] = array(
            'Meno' => $student["name"],
            'Priezvisko' => $student["surname"],
            'Tracker' => $item["tracker"],
        );

        if ($data[$i]['Tracker'] == "odisiel") {
            $output[$j] = array(
                'Meno' => $data[$i]['Meno'],
                'Priezvisko' => $data[$i]['Priezvisko'],
                'Tracker' => $data[$i]['Tracker'],
            );

            $j++;

        }
        $i++;
    }
    $log[] = $output;
    echo 'data: ' . json_encode($output) . PHP_EOL . PHP_EOL;
    ob_flush();
    flush();
    sleep(3);
}

