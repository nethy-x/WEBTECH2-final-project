<?php
session_start();
if(isset($_SESSION["username"])){

}else{
    header("Location: index.php?role=professor");
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
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
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index.php">Home</a>
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
                        <a class="nav-link active" aria-current="page" href="#">
                            <span data-feather="home"></span>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="teacher_new_test.php">
                            <span data-feather="file"></span>
                            New test
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart"></span>
                            Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users"></span>
                            Export
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="teacher_reports.php">
                            <span data-feather="bar-chart-2"></span>
                            Reports
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Content</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Test in progress</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Planned test</button>
                    </div>
                </div>
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
                <!--
                TODO
                -->
                <?php


                ?>
        </main>
    </div>
</div>
</body>
</html>
