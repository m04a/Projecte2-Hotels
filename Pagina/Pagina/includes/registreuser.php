<?php 

session_start(); 

include "conectar_DB.php";

if (isset($_POST['usuari']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $usuari = validate($_POST['usuari']);

    $pass = validate($_POST['password']);

    $pass1 = validate($_POST['cpassword']);

    if (empty($usuari)) {

        header("Location: login.php?error=Nom usuari obligatori");

        exit();

    }else if(empty($pass)){

        header("Location: login.php?error=Password obligatori");

        exit();
	}
	if ($pass != $pass1) {
	header("Location: login.php?error=Els passwords no corresponen");

        exit();
  }

  $check_user = "SELECT * FROM users WHERE username='$usuari' LIMIT 1";
  $result = mysqli_query($conn, $check_user);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // Si el usuari existeix
    if ($user['usuari'] === $usuari) {
      header("Location: login.php?error=El usuari existeix");

        exit();
    }
  }
$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$usuari', '$password')";
  	mysqli_query($db, $query);
}
	/*Si la connexió ha sigut correcte tornem al index.php o sigui en la pagina principal*/

    header("Location: index.php");

    exit();

}

?>