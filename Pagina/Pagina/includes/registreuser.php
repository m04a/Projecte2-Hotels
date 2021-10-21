<?php 

session_start(); 

require "conectar_DB.php";


  $usuari = validate($_POST['usuari']);

  $password = validate($_POST['password']);

 $query = "INSERT INTO usuario (IDusuario, password) VALUES('$usuari','$password')";
  	
 mysqli_query($db, $query);
 $sql = "INSERT INTO usuario (usuari,password) VALUES (:usuari,:password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usuari', $_POST['IDusuario']);
	$stmt->bindParam(':password', $_POST['password']);
?>