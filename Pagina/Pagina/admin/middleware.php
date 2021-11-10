<?php
session_start();
      if($_SESSION["tipo"]!="admin"){
                header('Location: middlewarefilter.php');
                }
?>