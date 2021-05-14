<?php
require_once(__DIR__ . "/classes/controllers/TestController.php");
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $email = $_SESSION["username"];
    $testController = new TestController();
    $tests = $testController->getIdCodeByProfessor($id);
} else {
    header("Location: index.php?role=professor");
    die();
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

    <script src="script/fetch_functions.js"></script>
    <script src="script/activation.js"></script>
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
                            Rozdelenie úloh
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Vami vytvorené testy</h1>
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
                        <th scope="col">ID</th>
                        <th scope="col">Kód testu</th>
                        <th scope="col">Časový limit</th>
                        <th scope="col">Aktivácia</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($tests as $test) {
                        if (strcmp($test['status'], "active") == 0) {
                            $status = "checked";
                        } else {
                            $status = "";
                        }
                        echo "<tr>" .
                            "<td>" .
                            $test['id'] .
                            "</td>" .
                            "<td>" .
                            $test['code'] .
                            "</td>" .
                            "<td>" .
                            $test['time_limit'] .
                            "</td>" .
                            "<td>" .
                            '<div class="form-check form-switch">
                                            <input class="form-check-input activation" type="checkbox" id="' . $test['code'] . '" ' . $status . ' >
                                        </div>' .
                            "</td>" .
                            "<td>" .
                            "<a href='test_detail.php?code=" . $test['code'] . "'><button class='btn btn-dark'>Detail</button></a>" .
                            "</td>" .
                            "<td>" .
                            "<a href='exports/pdfExport.php?code=" . $test['code'] . "'><button class='btn btn-dark'>Export testu</button></a>" .
                            "</td>" .
                            "<td>" .
                            "<a href='#'><button class='btn btn-dark'>Export hodnotenia</button></a>" .
                            "</td>" .
                            "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php include("partials/notification-html.php")?>
        </main>
    </div>
</div>
</body>
</html>
