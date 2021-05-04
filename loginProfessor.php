<?php
require_once("Database.php");

$conn = (new Database())->createConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ((isset($_POST['email']) && isset($_POST['psw']) ) &&
        (!empty($_POST['email']) && !empty($_POST['psw']))
    ) {
        $sql = "SELECT email, password FROM professor WHERE email=?";

        $stm = $conn->prepare($sql);
        $stm->execute([$_POST["email"]]);
        $user = $stm->fetch(PDO::FETCH_ASSOC);

        if(!empty($user)) {
            if (password_verify($_POST["psw"], $user["password"])) {
                $_SESSION['username'] = $user['email'];
                header("location: professor.php");
             } else {
                echo 'Nesprávne heslo.';
             }
        }
        else {
            echo "Učiteľ nebol nájdený.";
        }
    }
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
    <form action="loginProfessor.php" method="post">
        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="text" id="email" placeholder="Vložte email" name="email" required>
            <br>
            <label for="psw"><b>Heslo</b></label>
            <input type="password" id="psw" placeholder="Vložte heslo" name="psw" required>
            <br>
            <button type="submit">Prihlásiť sa</button>
            <br>
        </div>

    </form>
    <p>ak nie ste zaregistrovaný, registrujte sa na odkaze: <a href="registration.php">Registrácia</a></p>    
</body>

</html>