<?php 

session_start(); 

require "conectar_DB.php";

  $usuari = $_POST['usuari'];

  $password = $_POST['password'];

 $sql = "INSERT INTO usuario (IDusuario,password) VALUES ($usuari,$password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam('$usuari', $_POST['IDusuario']);
	$stmt->bindParam('$password', $_POST['password']);
?>