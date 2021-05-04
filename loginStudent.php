<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once("Database.php");

    $conn = (new Database())->createConnection();
    $stm = $conn->prepare("INSERT INTO student (id, name, surname, status, time) VALUES (?, ?, ?, ?, ?)");

    $stm->execute([$_POST['id_num'], $_POST['name'], $_POST['surname'], "Start", date('Y-m-d H:i:s', time())]);

    $_SESSION['name'] = $_POST["name"];
    $_SESSION['surname'] = $_POST["surname"];
    $_SESSION['id'] = $_POST["id_num"];



    header("Location: tests/" . $_POST["code"] . ".php");
}

?>

<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <title>WEBTE2</title>
</head>

<body>
    <a href="loginStudent.php">Študent</a> | <a href="loginProfessor.php">Učiteľ</a>
    <form action="#" method="post">
        <div class="container">
            <label for="code"><b>Kód testu</b></label>
            <input type="text" id="code" placeholder="Vložte kód testu" name="code" required>
            <br>
            <div id="login" style="display: none;">
                <label for="name"><b>Meno</b></label>
                <input type="text" id="name" placeholder="Vložte meno" name="name" required>
                <br>
                <label for="surname"><b>Priezvisko</b></label>
                <input type="text" id="surname" placeholder="Vložte priezvisko" name="surname" required>
                <br>
                <label for="id_num"><b>Identifikačné číslo</b></label>
                <input type="number" id="id_num" placeholder="Vložte identifikačné číslo" name="id_num" required>
                <br>
                <button type="submit">Prihlásiť sa</button>
                <br>
            </div>
        </div>

    </form>
    <script>
        $("#code").blur(function(e){
            var code = document.getElementById("code");
            e.preventDefault();
            $.ajax({
                url: "https://wt69.fei.stuba.sk/test123/validate.php",
                type: "get",
                data: {
                    code: code.value
                },
                success: function(data) {
                    if(data.code == "") {
                        document.getElementById("login").style.display = "none";
                        document.getElementById("code").style.borderColor = "red";
                    }
                    else {
                        document.getElementById("login").style.display = "block";
                        document.getElementById("code").style.borderColor = "green";
                    }
                }
            })
        }); 
    </script>
</body>

</html>