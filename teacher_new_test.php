<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Test</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom-style/new-test.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js" ></script>
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="">New test</a>
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
                        <a class="nav-link " aria-current="page" href="teacher_home.php">
                            <span data-feather="home"></span>
                            Domov
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="file"></span>
                            Nový test
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
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2"></span>
                            Reports
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Nový test</h1>
            </div>
            <div>
                <label for="create-test"></label>
                <input type="button" id="create-test" class="btn btn-primary" value="create new test" >
            </div>
            <div id="target" style="display: none">
                <form>
                    <div class="mt-3" id="question1-container">
                        <h2>Krátke odpovede</h2>
                        <?php include "otazka/question_1.php"?>
                        <hr>
                    </div>
                    <div>
                        <input class="btn btn-dark mt-1 mb-1" type="button" value="Ďalšia otázka" id="new-question1">
                    </div>
                    <div class="mt-3" id="question2-container">
                        <h2>Viaceré odpovede</h2>
                        <?php include "otazka/question_2.php"?>
                        <hr>
                    </div>
                    <div>
                        <input class="btn btn-dark mt-1 mb-1" type="button" value="Ďalšia otázka" id="new-question2">
                    </div>
                    <div class="mt-3" id="question3-container">
                        <h2>Párovanie odpovedí</h2>
                        <?php include "otazka/question_3.php"?>
                        <hr>
                    </div>
                    <div>
                        <input class="btn btn-dark mt-1 mb-1" type="button" value="Ďalšia otázka" id="new-question3">
                    </div>
                    <div class="mt-3" id="question4-container">
                        <h2>Kreslenie</h2>
                        <?php include "otazka/question_4.php"?>
                        <hr>
                    </div>
<!--                    <div>-->
<!--                        <input class="btn btn-dark mt-1 mb-1" type="button" value="Ďalšia otázka" id="new-question4">-->
<!--                    </div>-->
                    <div class="mt-3" id="question5-container">
                        <h2>Matematická otázka</h2>
                        <?php include "otazka/question_5.php"?>
                        <hr>
                    </div>
<!--                    <div>-->
<!--                        <input class="btn btn-dark mt-1 mb-1" type="button" value="Ďalšia otázka" id="new-question5">-->
<!--                    </div>-->
                    <div>
                        <input class="btn btn-dark" type="button" value="Submit" id="Submit-Test">
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
</body>
<script src="otazka/script/question_1_script.js"></script>
<script src="otazka/script/question_2_script.js"></script>
<script src="otazka/script/question_3_script.js"></script>
<script src="otazka/script/question_4_script.js"></script>
<script src='otazka/script/question_5_script.js'></script>";

<script src="script/fetch_functions.js"></script>
<script src="script/create_test.js"></script>
<script src="script/submit_test.js"></script>
</html>