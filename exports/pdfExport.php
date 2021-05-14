<?php
require_once(__DIR__ . "/../classes/controllers/StudentController.php");
require_once(__DIR__ . "/../classes/controllers/TestLogsController.php");
require_once(__DIR__ . "/../classes/controllers/TestController.php");
require_once(__DIR__. "/../classes/controllers/TestController.php");
require_once (__DIR__."/../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
session_start();

if (!isset($_GET["code"]) || !isset($_GET["student_id"]) || $_GET["student_id"] == -1) {
    header("Location: teacher_detail.php");
    die();
}

$code = $_GET["code"];
$student_id = $_GET["student_id"];

$_SESSION["code"] = $_GET["code"];

if (!isset($_SESSION["username"]) || !isset($_SESSION["id"])) {
    header("Location: index.php?role=professor");
    die();
}

$studentController = new StudentController();
$student_name = $studentController->getNameById($student_id);
if ($student_name == false) {
    $name = "Nedefinované";
    $surname = "Nedefinované";
} else {
    $name = $student_name["name"];
    $surname = $student_name["surname"];
}

$testLogsController = new TestLogsController();
$testController = new TestController();
$test_code = $testController->getIdByCode($code);
$test_json = $testLogsController->getTestByStudentTestId($student_id, $test_code);
$string = "";

$test_json = json_decode($test_json);
if($test_json == null){
    $string = "Študent neodovzdal test";
}else {
    foreach ($test_json as $eval => $item) {
        var_dump($item);
        foreach ($item as $question) {
            $string .= '<div>';
            if ($question->question_type == "question_1") {
                $string .= '<div >';
                $string .= '<h5 >' . $question->question . '</h5>';
                $string .= '<input type="text"  value="' . $question->answer . '" readonly>';
                $string .= '<input type="text"  value="' . "Počet bodov: " . $question->evaluation . '" readonly>';
                $string .= '</div>';

            }


            if ($question->question_type == "question_2") {
                $string .= '<div>';
                $string .= '<h5 >' . $question->question . '</h5>';
                foreach ($question->answer as $index => $answer) {
                    $string .= '<div >';
                    $string .= '<p type="text" value="' . $index . '">';
                    if ($answer) {
                        $answer = "checked";
                        $string .= '<p type="checkbox"  ' . $answer . ' ">';
                    } else {
                        $answer = "";
                        $string .= '<p type="checkbox"  ' . $answer . '">';
                    }
                    $string .= '</div>';

                }
                $string .= '<input type="text"  value="' . "Počet bodov: " . $question->evaluation . '" readonly>';
                $string .= '</div>';
            }

            if ($question->question_type == "question_3") {
                $string .= '<div >';
                $string .= '<h5 >' . $question->question . '</h5>';
                $string .= '<div >';
                $string .= '<div >';
                foreach ($question->answer as $index => $answer) {
                    $string .= '<input type="text" style="margin-right:25%;"  value="' . $index . '" readonly>';

                }
                $string .= '</div>';
                $string .= '<div >';
                foreach ($question->answer as $index => $answer) {

                    $string .= '<input type="text"  value="' . $answer . '" readonly>';

                }
                $string .= '</div>';
                $string .= '</div>';
                $string .= '<input type="text" value="' . "Počet bodov: " . $question->evaluation . '" readonly>';
                $string .= '</div>';
            }
            if ($question->question_type == "question_5") {
                $string .= '<div>';
                $string .= '<h5>' . $question->question . '</h5>';
                foreach ($question->answer as $index => $answer) {
                    $string .= '<div >';
                    $string .= '<math-field read-only role="textbox" tabindex="0">' . $index . '</math-field>';
                    $string .= '</div>';
                    $string .= '<div>';
                    $string .= '<math-field read-only role="textbox" tabindex="0" >' . $answer . '</math-field>';
                    $string .= '</div>';
                }
                $string .= '<input type="text"value="' . "Počet bodov: " . $question->evaluation . '" readonly>';
                $string .= '</div>';
            }
            $string .= '</div>';
        }
        if ($eval == "evaluation_sum") {
            $string .= '<div >';
            $string .= '<input type="text"value="' . "Celkový počet bodov: " . $item . '" readonly>';
            $string .= '</div>';
        }

    }
}

if(isset($_GET["code"]) && isset($_GET["student_id"])){
    if (isset($_SESSION["username"]) && isset($_SESSION["id"])) {
        $id = $_SESSION["id"];
        $email = $_SESSION["username"];
        $testController = new TestController();
        $testCode = $_GET['code'];
        $test = $testController->getByCode($testCode);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($string);
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream();
    } else {
        header("Location: index.php?role=professor");
        die();
    }
}
?>