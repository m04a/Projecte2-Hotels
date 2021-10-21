<?php 


session_start(); 

include "conectar_DB.php";

$db = mysqli_connect('localhost', 'kirill', 'Nemes1sx', 'hotel');

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }
    $usuari = validate($_POST['usuari']);

    $pass = validate($_POST['password']);

    /*$pass1 = validate($_POST['cpassword']);*/

  /*  if (empty($usuari)) {

        header("Location: registre.php?error=Nom usuari obligatori");

        exit();

    }else if(empty($pass)){

        header("Location: registre.php?error=Password obligatori");

        exit();
	}
	if ($pass != $pass1) {
	header("Location: registre.php?error=Els passwords no corresponen");

        exit();
  }

  $check_user = "SELECT * FROM usuario WHERE IDusuario='$usuari' LIMIT 1;";
  $result = mysqli_query($db, $check_user);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // Si el usuari existeix
    if ($user['usuari'] === $usuari) {
      header("Location: login.php?error=El usuari existeix");

        exit();
    }
  }*/
$query = "INSERT INTO usuario (IDusuario, password) 
  			  VALUES('$usuari','$pass');";
  	
	mysqli_query($db, $query);

	/*Si la connexió ha sigut correcte tornem al index.php o sigui en la pagina principal*/

    header("Location: index.php");

    exit();

}

?>