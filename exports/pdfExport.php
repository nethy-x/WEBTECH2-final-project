<?php
require_once(__DIR__. "/../classes/controllers/TestController.php");
require_once (__DIR__."/../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
session_start();
if(isset($_GET["code"])){
    if (isset($_SESSION["username"]) && isset($_SESSION["id"])) {
        $id = $_SESSION["id"];
        $email = $_SESSION["username"];
        $testController = new TestController();
        $testCode = $_GET['code'];
        $tests = $testController->getByCode($testCode);
        $dompdf = new Dompdf();
        //TODO sem hod stranku ale najsor ju nacitaj do premennej ako dom element
        $dompdf->loadHtml("student_home.php");
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream();
    } else {
        header("Location: index.php?role=professor");
        die();
    }
}
