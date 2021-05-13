
<?php
session_start();

if(session_destroy()) {
    session_commit();
    header("Location: index.php");
}
?>

