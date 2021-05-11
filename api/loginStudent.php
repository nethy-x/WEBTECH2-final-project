<?php
session_start();
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

date_default_timezone_set('Europe/Bratislava');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once(__DIR__ . "/../classes/helpers/Database.php");

    $conn = (new Database())->createConnection();

    $statement = $conn->prepare("SELECT id FROM tests WHERE code=?");
    $statement->execute([$_POST["code"]]);
    $test_id = $statement->fetch(PDO::FETCH_ASSOC);

    //TODO: start sa meni az ked sa button stlaci
    $s = $conn->prepare("INSERT IGNORE INTO test_logs (test_id, student_id, start) VALUES (?, ?, ?)");
    $s->execute([$test_id['id'], $_POST['id_num'], date('Y-m-d H:i:s', time())]);

    $stm = $conn->prepare("INSERT IGNORE INTO student (id, name, surname) VALUES (?, ?, ?)");
    $stm->execute([$_POST['id_num'], $_POST['name'], $_POST['surname']]);

    $_SESSION['name'] = $_POST["name"];
    $_SESSION['surname'] = $_POST["surname"];
    $_SESSION['id'] = $_POST["id_num"];
    $_SESSION['code'] = $_POST["code"];
    $_SESSION['role'] = "student";

    header("Location: ../student_home.php");
}

?>