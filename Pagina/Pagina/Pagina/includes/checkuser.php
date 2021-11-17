<?php
session_start();
      if(isset($_SESSION["tipo"])){
           header('Refresh: 5; URL=index.php?r=index.php');       
      }
?>