<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
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
            <a class="nav-link" href="logout.php">Sign out</a>
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
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
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
                <h1 class="h2">New test</h1>
            </div>
            <div>
                <label for="create-test"></label>
                <input type="button" id="create-test" class="btn btn-primary" value="create new test" >
            </div>
            <div id="target" style="display: none">
                <form>
                    <div>
                        <h2>question1</h2>
                        <?php include "otazka/question_1.php"?>
                    </div>
                    <div>
                        <h2>question2</h2>
                        <?php include "otazka/question_2.php"?>
                    </div>
                    <div>
                        <h2>question3</h2>
                        <?php include "otazka/question_3.php"?>
                    </div>
                    <div>
                        <h2>question4</h2>
                        <?php include "otazka/question_4.php"?>
                    </div>
                    <div>
                        <h2>question5</h2>
                        <?php include "otazka/question_5.php"?>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>
</body>
<script src="script/create_test.js"></script>
</html>
