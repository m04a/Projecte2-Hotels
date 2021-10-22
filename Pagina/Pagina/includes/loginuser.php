<!DOCTYPE html>
  <?php

include 'includes/conectar_DB.php';

if(!isset($_POST['usuari'],$_POST['password'])){
    echo('Location:login.php');
    header('Location:login.php');
}
$sql= "SELECT tipo FROM usuario WHERE usuari='".$_POST['usuari']."' AND password='".$_POST['password']."' LIMIT 1;";

$rol = $conn->query($sql);

    while($row = $rol->fetch_assoc()) {
        if($row['rol']==''){
            header('Location:/index.php');
        } else{
            header('Location:admin/admin.php');
        }
        
    }
 ?>