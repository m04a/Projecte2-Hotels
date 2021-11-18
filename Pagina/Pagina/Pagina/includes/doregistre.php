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
      if(empty($usuari)){
          $stmt->bindParam(':usuari', $null);
      }else{
          $stmt->bindParam(':usuari', $usuari);
      }
      if(empty($password)){
          $stmt->bindParam(':password', $null);
      }else{
          $stmt->bindParam(':password', $password);
      }
      if(empty($nombre)){
          $stmt->bindParam(':nombre', $null);
      }else{
          $stmt->bindParam(':nombre', $nombre);
      }
      if(empty($apellidos)){
          $stmt->bindParam(':apellidos', $null);
      }else{
          $stmt->bindParam(':apellidos', $apellidos);
      }
      if(empty($fechanacimiento)){
          $stmt->bindParam(':fechanacimiento', $null);
      }else{
        $fechanacimiento = date('Y-m-d', strtotime(str_replace('-', '/', $fechanacimiento))); 
        $stmt->bindParam('$fechanacimiento', $_POST['fechanacimiento']);
      }
      if(empty($sexo)){
          $stmt->bindParam(':sexo', $null);
      }else{
          $stmt->bindParam(':sexo', $sexo);
      }
      if(empty($email)){
          $stmt->bindParam(':email', $null);
      }else{
          $stmt->bindParam(':email', $email);
      }
  }
  //date in mm/dd/yyyy format; or it can be in other formats as well
  $birthDate = $fechanacimiento;
  //explode the date to get month, day and year
  $birthDate = explode("-", $birthDate);
  //get age from date or birthdate
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));
  $message = $age;


    if ($stmt->execute()) {
      $message .= 'El usuari ha sigut creat';
    } else {
      $message .= 'Ha hagut algun error';
    }
  }
?>