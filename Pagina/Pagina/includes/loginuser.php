<?php

require 'conectar_DB.php';

if(!isset($_POST['usuari'],$_POST['password'])){
    echo('Location:../login.php');
    header('Location:../login.php');
}
$usuari = $_POST['usuari']; 
$password = $_POST['password']; 
/*
$sql= "SELECT tipo FROM usuario WHERE usuari='$usuari' AND password='$password' LIMIT 1;";

$rol = $conn->query($sql);

    while($row = $rol->fetch_assoc()) {
        if($row['rol']=='cliente'){
            header('Location:../index.php');
        } else{
            header('Location:../admin/admin.php');
        }
        
    }*/
 ?>