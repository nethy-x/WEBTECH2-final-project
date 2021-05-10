<?php
session_start();

$code = "Kód testu";

if(isset($_SESSION["code"])){
    $code = $_SESSION["code"];
}else{
    header("Location: index.php?role=student");
}

require_once(__DIR__ . "/classes/helpers/Database.php");

$conn = (new Database())->createConnection();

if (isset($_POST["test_finished"])) {
    $sql = "INSERT INTO test_logs (finish) VALUES (?) WHERE student_id=? AND test_id=(SELECT id FROM tests WHERE code=?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([date('Y-m-d H:i:s', time()), $_SESSION['id'], $_SESSION["code"]]);
}
$conn = null;

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Home</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="script/fetch_functions.js"></script>
    <script src="script/start_test.js"></script>
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><?php echo $code;?></a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#testFinished">Odhlásiť sa a odovzdať test</button>
        </li>
    </ul>
</header>
<div id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">

</div>
<div class="container-fluid">
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Webové technológie 2</h1>
            </div>

            <div>
                <button type="button" id="start-test" class="btn btn-primary">Začať písať test</button>
            </div>

            <div id="test">

            </div>
        </main>
    </div>
</div>
<div class="container-fluid fixed-bottom justify-content-center">
<div class="row text-center" id="timer" style="display: none;">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <h3>Zostávajúci čas:<h3>
                    </li>
                    
                </ul>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <p id="time" style="font-size: 25px; font-weight: bold;"></p>
                    </li>
                    
                </ul>
</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="testFinished" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Test bol úspešne ukončený</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Vaše odpovede boli uložené.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvoriť a prejsť na hlavnú stránku</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="time_limit/js/countdown.js"></script>
</body>
</html>