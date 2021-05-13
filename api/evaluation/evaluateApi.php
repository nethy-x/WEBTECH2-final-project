<?php
//echo json_encode("result api/evaluation/evaluateApi.php -->Success<--");
require_once(__DIR__ . "/../../classes/controllers/TestController.php");
require_once(__DIR__ . "/../../classes/controllers/TestLogsController.php");
session_start();
$json = file_get_contents('php://input');
$data = json_decode($json);

if (isset($data) && isset($data->test) && isset($_SESSION['id']) && isset($_SESSION['code'])) {
    $code = $_SESSION['code'];
    $student_id = $_SESSION['id'];
    $test_conroller = new TestController();
    $test_id = $test_conroller->getIdByCode($code);
    $test = $test_conroller->getByCode($code);
    $correct_test = json_decode($test);

    $student_test = $data->test;


    $evaluation_sum = 0;

    foreach ($student_test as $key => $value) {

        foreach ($value as $question_index => $question_values) {
            $question_values->evaluation = 0;
            if (!strcmp($question_values->question_type, "question_1")) {
                $correct = in_array($question_values->answer, $correct_test->{$key}->{$question_index}->correct);
                if ($correct) {
                    $question_values->evaluation++;
                    $evaluation_sum++;
                }

            } else if (!strcmp($question_values->question_type, "question_2")) {
                foreach ($question_values->answer as $answer_key => $answer_value) {
                    if ($answer_value) {
                        $correct = in_array($answer_key, $correct_test->{$key}->{$question_index}->correct);
                        if ($correct) {
                            $question_values->evaluation++;
                            $evaluation_sum++;
                        }else{
                            $question_values->evaluation--;
                            if($question_values->evaluation < 0){
                                $question_values->evaluation = 0;
                            }
                        }
                    }
                }
            } else if(!strcmp($question_values->question_type, "question_3")){
                foreach ($question_values->answer as $answer_key => $answer_value) {
                        if(!strcmp($answer_value, $correct_test->{$key}->{$question_index}->answer->{$answer_key})){
                            $question_values->evaluation++;
                            $evaluation_sum++;
                        }
                }
            }
        }
    }

    $student_test->evaluation_sum = $evaluation_sum;

    $testLogsController = new TestLogsController();
    $testLogsController->addTestAndEvaluation($evaluation_sum, json_encode($student_test), $student_id, $test_id);

    $response = array("error" => false, "message" => "Test bol úspešne odoslány, váš priebežný počet bodov je: " . $evaluation_sum, "evaluation" =>$evaluation_sum);

    echo json_encode($response);
} else {
    $response = array("error" => true, "message" => "Študent nie je prihlásený");
    echo json_encode($response);
}
