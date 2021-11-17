<?php
session_start();
      if(isset($_SESSION["tipo"])){
           header('Refresh: URL=index.php?r=index.php');       
      }
?>