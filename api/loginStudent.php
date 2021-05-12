<?php
require_once(__DIR__ . "/../classes/controllers/StudentController.php");
session_start();
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

date_default_timezone_set('Europe/Bratislava');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once(__DIR__ . "/../classes/helpers/Database.php");

    $conn = (new Database())->createConnection();
    $studentController = new StudentController();
    $statement = $conn->prepare("SELECT id FROM tests WHERE code=?");
    $statement->execute([$_POST["code"]]);
    $test_id = $statement->fetch(PDO::FETCH_ASSOC);

    //TODO: start sa meni az ked sa button stlaci
    try {
        $stm = $conn->prepare("INSERT  INTO student (id, name, surname) VALUES (?, ?, ?)");
        $stm->execute([$_POST['id_num'], $_POST['name'], $_POST['surname']]);
    } catch (Exception $e) {
        $name = $studentController->getNameById($_POST['id_num']);
        if (strcmp($name['name'], $_POST['name']) != 0 || strcmp($name['surname'], $_POST['surname']) != 0) {
            header("Location: ../index.php?role=student&loginError=4");
            die();
        }
    }
    try {
        $s = $conn->prepare("INSERT INTO test_logs (test_id, student_id, start) VALUES (?, ?, ?)");
        $s->execute([$test_id['id'], $_POST['id_num'], date('Y-m-d H:i:s', time())]);
    } catch (Exception $e) {
        header("Location: ../index.php?role=student&loginError=3");
        die();
    }
    $_SESSION['name'] = $_POST["name"];
    $_SESSION['surname'] = $_POST["surname"];
    $_SESSION['id'] = $_POST["id_num"];
    $_SESSION['code'] = $_POST["code"];
    $_SESSION['role'] = "student";

    header("Location: ../student_home.php");
}

?>