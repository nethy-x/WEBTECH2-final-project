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
$string = "";

if (!isset($_SESSION["username"]) || !isset($_SESSION["id"])) {
    header("Location: index.php?role=professor");
    die();
}

                $testLogsController = new TestLogsController();
                $testController = new TestController();
                $test_code = $testController->getIdByCode($code);
                $test_json = $testLogsController->getTestByStudentTestId($student_id, $test_code);

                $test_json = json_decode($test_json);
                if ($test_json == null) {
                    $string.= '<h5>Študent doposial neodovzdal test.</h5>';
                } else {
                    foreach ($test_json as $eval => $item) {
                        if ($eval == "evaluation_sum") {
                            $string .= '<div >';
                            $string .= '<p>' . $item . ' </p>';
                            $string .= '</div>';
                            continue;
                        }
                        foreach ($item as $question) {
                            $string .= '<div >';
                            if ($question->question_type == "question_1") {
                                $string .= '<div >';
                                $string .= '<h5 >' . $question->question . '</h5>';

                                $string .= '<p>' . $question->answer . ' </p>';
                                $string .= '<p>' . $question->evaluation . ' </p>';

                                $string .= '</div>';

                            }


                            if ($question->question_type == "question_2") {
                                $string .= '<div >';
                                $string .= '<h5 >' . $question->question . '</h5>';
                                foreach ($question->answer as $index => $answer) {
                                    $string .= '<div>';
                                    $string .= '<input type="text"  value="' . $index . '" >';
                                    $string .= '<p>' . $index . '</p>';
                                    if ($answer) {
                                        $string .= "checked";

                                    } else {
                                        $string .= "unchecked";

                                    }
                                    $string .= '</div>';

                                }
                                $string .= '<p>' . $question->evaluation . '</p>';

                                $string .= '</div>';
                            }



                            if ($question->question_type == "question_3") {
                                $string.= '<div >';
                                $string.= '<h5 >' . $question->question . '</h5>';
                                $string.= '<div >';
                                $string.= '<div >';
                                foreach ($question->answer as $index => $answer) {
                                    $string.= '<p>'. $index .'</p>';

                                }
                                $string.= '</div>';
                                $string.= '<div >';
                                foreach ($question->answer as $index => $answer) {

                                    $string.= '<p>'. $answer .'</p>';

                                }
                                $string.= '</div>';
                                $string.= '</div>';
                                $string.= '<p>'. $question->evaluation .'</p>';
                                $string.= '</div>';
                            }
                            if ($question->question_type == "question_5") {
                                $string.= '<div >';
                                $string.='<h5>' . $question->question . '</h5>';
                                foreach ($question->answer as $index => $answer) {
                                    $string.='<div >';
                                    $string.= '<p>' . $index . '</p>';
                                    $string.='</div>';
                                    $string.= '<div  >';
                                    $string.= '<p>' . $answer . '</math-field>';
                                    $string.= '</div>';
                                }


                                $string.= '<p>'. $question->evaluation .'</p>';
                                $string.= '</div>';
                            }
                            $string.= '</div>';
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
        //echo $string;
        $dompdf->stream();
    } else {
        header("Location: index.php?role=professor");
        die();
    }
}
?>