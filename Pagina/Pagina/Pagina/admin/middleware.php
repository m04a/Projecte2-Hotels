<?php
session_start();
      if($_SESSION["tipo"]="admin"){
            
      }elseif($_SESSION["tipo"]="gestor"){
           
      }else{
            header('Location: middlewarefilter.php');
      }
?>