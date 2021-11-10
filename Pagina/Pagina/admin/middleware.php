<?php
session_start();
      if($_SESSION["tipo"]!="admin"){
      	echo "No tens permisos per accedir aquesta pagina! Es farà una redirecció en 5 segons...";
      	header('Refresh: 5; URL=../index.php');
                }
?>