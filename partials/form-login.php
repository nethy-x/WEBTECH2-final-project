<?php
if(isset($_GET["proffesor"])){
    include __DIR__ . "/loginProfessor.php";
}else{
    include __DIR__ . "/loginStudent.php";
}
