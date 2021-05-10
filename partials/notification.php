<?php


require_once(__DIR__ . "/../classes/controllers/TestController.php");
require_once(__DIR__ . "/../classes/controllers/TestLogsController.php");
require_once(__DIR__ . "/../classes/controllers/StudentController.php");


header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header("Connection: keep-alive");

$testController = new TestController();
$testLogsController = new TestLogsController();
$studentController = new StudentController();

$test = "6096ff507e84e";

while (true) {
$testId = $testController->getIdByCode($test);
$trackersArray = $testLogsController->getAllByTestId($testId);

$i = 0;
foreach ($trackersArray as $item){

    $student = $studentController->getNameById($item["student_id"]);
    $data[$i] = array(
        'Meno' => $student["name"],
        'Priezvisko' => $student["surname"],
        'Tracker' => $item["tracker"],
    );

//    echo  $student["name"] . " " . $student["surname"] . " ". $item["tracker"]."\r\n";
    $i++;
}
echo 'data: ' . json_encode($data) . PHP_EOL . PHP_EOL;
    ob_flush();
    flush();
    sleep(3);
}
