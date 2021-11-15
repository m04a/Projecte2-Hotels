<?php
session_start();
      if($_SESSION["tipo"]="admin"){
            header('Location: middlewarefilter.php');
      }elseif($_SESSION["tipo"]="gestor"){
            header('Location: middlewarefilter.php');
      }else{
            header('Location: middlewarefilter.php');
      }
?>