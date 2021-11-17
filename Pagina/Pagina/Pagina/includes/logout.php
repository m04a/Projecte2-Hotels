<?php
    session_start();
    unset($_SESSION["usuari"]);
    unset($_SESSION["tipo"]);
    header("Location:../public/index.php?r=index");
?>