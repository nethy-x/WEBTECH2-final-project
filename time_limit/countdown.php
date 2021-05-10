<?php
header('Content-Type: text/html; charset=UTF-8');
header('Cache-Control: no-cache');

//require_once(__DIR__ . "/classes/helpers/Database.php");

//$con = (new Database())->createConnection();

if(isset($_GET["time"]) && isset($_GET["limit"])) {
    $time = $_GET["limit"];

    while (true) {
        $msg = json_encode([
            "time" => $time
        ]);
        echo $msg;
        //$index = 0;
        //sendSse($index++, $msg);
        //sleep(1);
        break;
    }
}



function sendSse($id, $msg)
{
    echo "id: $id\n";
    echo "event: evt\n";
    echo "data: $msg\n\n";
    ob_flush();
    flush();
}
