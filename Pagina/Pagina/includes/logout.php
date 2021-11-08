<?php
    session_start();
    unset($_SESSION["usuari"]);
    header("Location:login.php");
?>