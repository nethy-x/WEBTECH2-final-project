<?php
require_once(__DIR__ . "/classes/controllers/StudentController.php");
require_once(__DIR__ . "/classes/controllers/TestLogsController.php");

session_start();
if (!isset($_GET["code"]) || !isset($_GET["student_id"]) || $_GET["student_id"] == -1) {
    header("Location: teacher_detail.php");
    die();
}

$code = $_GET["code"];
$student_id = $_GET["student_id"];

$_SESSION["code"] = $_GET["code"];
//$_SESSION["student_id"] = $_GET["student_id"];

if (!isset($_SESSION["username"]) || !isset($_SESSION["id"])) {
    header("Location: index.php?role=professor");
    die();
}

$studentController = new StudentController();
$student_name = $studentController->getNameById($student_id);
if($student_name == false){
    $name = "Nedefinované";
    $surname = "Nedefinované";
}else{
    $name = $student_name["name"];
    $surname = $student_name["surname"];
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testovanie</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <script src="script/notification.js"></script>
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index.php">Profesor</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="logout.php">Odhlásiť sa</a>
        </li>
    </ul>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            Domov
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="teacher_new_test.php">
                            Nový test
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="teacher_detail.php">
                            Detaily testov
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Export
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="teacher_reports.php">
                            Reports
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Detail testu s k. <?php echo $code?> <br> Študenta: <?php echo $name . " ". $surname?></h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Test in progress</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Planned test</button>
                    </div>
                </div>
            </div>
            <?php
                $testLogsController = new TestLogsController();
                $testController = new TestController();
                $testController->getIdByCode($code);
                $testLogsController->getTestByStudentTestId($student_id,$testController);
                var_dump($testLogsController);
            ?>
            <?php include("partials/notification-html.php")?>
        </main>
    </div>
</div>
</body>
</html>
