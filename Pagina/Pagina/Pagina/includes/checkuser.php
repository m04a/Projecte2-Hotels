<?php
session_start();
      if(isset($_SESSION["tipo"])){
           header('Location: URL=index.php?r=index.php');       
      }
?>