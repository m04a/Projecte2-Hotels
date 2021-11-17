<?php
session_start();
      if(isset($_SESSION["tipo"])){
           header('Location: index.php?r=index.php');       
      }
?>