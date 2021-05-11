<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Testovanie</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <link href="css/custom-style/index-style.css" rel="stylesheet">

</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="">Prihlásenie</a>

</header>
<div class="container-fluid">
    <div class="row">
        <main class="col px-md-4">
            <div class="flex-row d-flex justify-content-center">
                <?php
                session_start();
                if (isset($_SESSION['role'])) {
                    if(strcmp($_SESSION['role'],"student") == 0 && isset($_SESSION['code'])){
                        header("Location: student_home.php");
                        die();
                    }else if(strcmp($_SESSION['role'],"professor") == 0 && isset($_SESSION['username']) && isset($_SESSION['id'])){
                        header("Location: teacher_home.php");
                        die();
                    }
                } else {
                    include __DIR__ . "/partials/page-login.php";
                }
                ?>
            </div>
        </main>
    </div>
</div>
</body>
</html>
