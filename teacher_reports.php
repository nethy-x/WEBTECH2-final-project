<?php
session_start();
if(isset($_SESSION["username"]) && isset($_SESSION["id"])){
    $id =  $_SESSION["id"];
    $email =  $_SESSION["username"];
}else{
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
                        <a class="nav-link" href="teacher_home.php">
                            Domov
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="teacher_new_test.php">
                            Nový test
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="teacher_detail.php">
                            Detaily testov
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Export
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  active" aria-current="page" href="teacher_reports.php">
                            Reports
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Zoznam ALT+TABerov</h1>
            </div>


            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
                <div class="toast"  role="alert" aria-live="assertive" aria-atomic="true">
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

            <div id="logs-div">
                <table>
                <thead>
                <tr>
                    <th>Meno</th>
                    <th>Priezvisko</th>
                    <th>Stav</th>
                </tr>
                </thead>
                <tbody id="table-log">
                    <script>
                        var notificationTable = localStorage.getItem('notification');
                        var logs = JSON.parse(notificationTable)
                        logs.forEach((element, index) => {
                            document.getElementById("table-log").innerHTML += "<tr>" + "<td>" + element["Meno"] +"</td>" + "<td>" + element["Priezvisko"] +"</td>" + "<td>" + element["Tracker"] +"</td>" + "</tr>"
                        });</script>
                </tbody>
                </table>
            </div>


            <!--
            TODO
            -->
            <?php


            ?>
        </main>
    </div>
</div>
</body>
<script src="script/notification.js"></script>
</html>
