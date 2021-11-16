<?php
    session_start();
    unset($_SESSION["usuari"]);
    unset($_SESSION["tipo"]);
    header("Location:../index.php?r=index");
?>