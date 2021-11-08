<?php
    session_start();
    unset($_SESSION["usuari"]);
    header("Location:../vistes/login.php");
?>