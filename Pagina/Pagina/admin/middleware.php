<?php
session_start();
      if($_SESSION["tipo"]="cliente"){
      			echo 'Estas accedint en una pagina prohbida';
                header('Refresh: 10; URL=../includes/index.php');
                }
?>