 <?php
 $message = '';
	function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
}
  if (isset($_POST["Submit1"])) {
      $usuari = $_POST['usuari']; 
      validate($usuari);
	    $password = $_POST['password'];
      validate($password);
	    $passwordc = $_POST['passwordc']; 
      validate($passwordc);
      $nombre = $_POST['nombre']; 
      validate($nombre);      
      $apellidos = $_POST['apellidos'];
      validate($apellidos);
      $email = $_POST['email'];
      validate($email);
      $fechanacimiento = $_POST['fechanacimiento'];
      $sexo = $_POST['sexo'];



if ($password != $passwordc) {
	$message = 'Les contrasenyes no son iguals';
	header("Location: registre.php");
  }else{
	  // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

	  $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuario (usuari,password,nombre,apellidos,email,fechanacimiento,sexo) VALUES ('$usuari','$password','$nombre','$apellidos','$email','$fechanacimiento',$sexo);";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam('$usuari', $_POST['usuari']);
    $stmt->bindParam('$password', $_POST['password']);
    $stmt->bindParam('$email', $_POST['email']);
    $stmt->bindParam('$nombre', $_POST['nombre']);
    $stmt->bindParam('$apellidos', $_POST['apellidos']);
    $stmt->bindParam('$sexo', $_POST['sexo']);

    $fechanacimiento = date('Y-m-d', strtotime(str_replace('-', '/', $fechanacimiento))); 
    $stmt->bindParam('$fechanacimiento', $_POST['fechanacimiento']);

  }

    if ($stmt->execute()) {
      $message = 'El usuari ha sigut creat';
    } else {
      $message = 'Ha hagut algun error';
    }
  }
?>