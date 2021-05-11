<?php

session_start();
require_once(__DIR__ . "/../classes/helpers/Database.php");

$conn = (new Database())->createConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ((isset($_POST['email']) && isset($_POST['psw'])) &&
        (!empty($_POST['email']) && !empty($_POST['psw']))
    ) {
        $sql = "SELECT id, email, password FROM professor WHERE email=?";

        $stm = $conn->prepare($sql);
        $stm->execute([$_POST["email"]]);
        $user = $stm->fetch(PDO::FETCH_ASSOC);

        if (!empty($user)) {
            if (password_verify($_POST["psw"], $user["password"])) {
                $_SESSION['username'] = $user['email'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['role'] = "professor";
                header("Location: ../teacher_home.php");

//                die();
            } else {
                header("Location: ../index.php?role=professor&loginError=2");
//                die();
            }
        } else {
            header("Location: ../index.php?role=professor&loginError=1");
//            die();
        }
    }
}
?>