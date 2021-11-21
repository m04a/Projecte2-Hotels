<!--
    * Include checkuser
    * 
    * @author: MohamedBourarach mbourarachs@cendrassos.net
    *
    * Si el tipus esta asignat en el login o el registre ens torna a la pagina principal
    *
-->
 <?php
 $message = '';
 $fallo = '';
 /**
  * comprueba la variable para evitar posibles inyecciones sql
  */
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

/** 
 * En caso de que haya algun fallo, devuelve un mensaje de error y no deja avanzar.
 * Si todo es correcto inserta el usuario en la base de datos
*/
if ($password != $passwordc) {
	$fallo = 'Les contrasenyes no son iguals';
  }else{
	  // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    if(empty($password)){
      $fallo="la contrasenya es obligatoria";
    }
	  $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO usuario (usuari,password,nombre,apellidos,email,fechanacimiento,sexo) VALUES ('$usuari','$password','$nombre','$apellidos','$email','$fechanacimiento',$sexo);";
    $null=NULL;
    $stmt = $conn->prepare($sql);
      if(empty($usuari)){
          $fallo="l'usuari es obligatori";
      }else{
          $stmt->bindParam(':usuari', $usuari);
      }
          $stmt->bindParam(':password', $password);
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
        $fallo="la data de neixament es obligatoria";
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
  /**
   * comprueba si ha habido algun fallo, si no hay ninguno comprueba que el usuario sea mayor de edad y si lo es lo registra a la BBDD
   */
  if(!$fallo==''){
    $message=$fallo;
    }else{
    $tz  = new DateTimeZone('Europe/Brussels');
    $age = DateTime::createFromFormat('Y-m-d', $fechanacimiento, $tz)
        ->diff(new DateTime('now', $tz))
        ->y;
        if($fechanacimiento>date("Y-m-d")){
          $message = "no acceptem viatgers en el temps nascuts en el futur";
        }else{
          if($age<18||$fechanacimiento==null){
            $message = "Tens que ser major d'edad per tenir un compte";
          }else{
              if ($stmt->execute()) {
                $message = "El usuari ha sigut creat";
              } else {
                $message = 'Ha hagut algun error';
              }
            }  
        }
    }
  }
?>