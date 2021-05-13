<?php
require_once(__DIR__ . "/classes/controllers/TestLogsController.php");
require_once(__DIR__ . "/classes/controllers/TestController.php");
require_once(__DIR__ . "/classes/controllers/StudentController.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $testLogsController = new TestLogsController();
    $studentController = new StudentController();
    $testController = new TestController();
    $tests = $testLogsController->getTestDetail($id);
} else {
    header("Location: index.php?role=professor");
    die();
}
$code = $testController->getCodeById($id);
$delimiter = ",";
$filename = "hodnotenia_" . $code . ".csv";

//create a file pointer
$f = fopen('php://memory', 'w');

//set column headers
$fields = array('ID', 'Meno', 'Priezvisko', 'Hodnotenie');
fputcsv($f, $fields, $delimiter);

//output each row of the data, format line as csv and write to file pointer
foreach ($tests as $test) {
    $student = $studentController->getNameById($test["student_id"]);
    $lineData = array($test["student_id"], $student['name'], $student['surname'], 0);
    fputcsv($f, $lineData, $delimiter);
}

//move back to beginning of file
fseek($f, 0);

//set headers to download file rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $filename . '";');

//output all remaining data on a file pointer
fpassthru($f);

exit;
