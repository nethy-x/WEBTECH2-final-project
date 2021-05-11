<?php
require_once(__DIR__ . "/classes/controllers/TestLogsController.php");
require_once(__DIR__ . "/classes/controllers/TestController.php");
require_once(__DIR__ . "/classes/controllers/StudentController.php");

session_start();
if (!isset($_GET["code"])) {
    header("Location: teacher_detail.php");
    die();
}

$code = $_GET["code"];
$_SESSION["code"] = $_GET["code"];

if (!isset($_SESSION["username"]) || !isset($_SESSION["id"])) {
    header("Location: index.php?role=professor");
    die();
}

$id = $_SESSION["id"];
$email = $_SESSION["username"];

$testController = new TestController();
$test_id = $testController->getIdByCode($code);

$testLogsController = new TestLogsController();
$test_detail = $testLogsController->getTestDetail($test_id);

if ($test_detail == false) {
//    header("Location: teacher_detail.php");
//    die();
    $test_detail = array();
}

$studentController = new StudentController();
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
                        <a class="nav-link" href="#">
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
                <h1 class="h2">Test s k. <?php echo $code; ?></h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Test in progress</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Planned test</button>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Meno</th>
                        <th scope="col">Priezvisko</th>
                        <th scope="col">start</th>
                        <th scope="col">finish</th>
                        <th scope="col">tracker</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($test_detail as $test_log) {
                        $name_surname = $studentController->getNameById($test_log["student_id"]);
                        if ($name_surname == false) {
                            $name = "Nedefinované";
                            $surname = "Nedefinované";
                        } else {
                            $name = $name_surname["name"];
                            $surname = $name_surname["surname"];
                        }
                        echo "<tr>" .
                                "<td>" .
                                    $name .
                                "</td>" .
                                "<td>" .
                                    $surname .
                                "</td>" .
                                "<td id='start_student_' " . $test_log["student_id"] . ">" .
                                    $test_log["start"] .
                                "</td>" .
                                "<td id='finish_student_' " . $test_log["student_id"] . ">" .
                                    $test_log["finish"] .
                                "</td>" .
                                "<td id='tracker_student_' " . $test_log["student_id"] . ">" .
                                    $test_log["tracker"] .
                                "</td>" .
                            "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
                <div class="toast" data-autohide="false" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">Alt+Tab tracker</strong>
                        <small class="text-muted">just now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div id="notification-body" class="toast-body">
                        Niekto opustil tab.
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>
