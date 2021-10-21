<!DOCTYPE html>
  <?php

require 'includes/conectar_DB.php';
  $message = 'defecto';
	function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
}
  if (!empty($_POST['usuari']) && !empty($_POST['password'])) {
      $usuari = $_POST['usuari']; 
      validate($usuari);
	$password = $_POST['password'];
	$passwordc = $_POST['cpassword']; 
if ($password != $passwordc) {
	$message = 'Les contrasenyes no son iguals';
	header("Location: registre.php");
  }else{
	validate($password);
	$sql = "INSERT INTO usuario (usuari, password) VALUES ('$usuari','$password');";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam('$usuari', $_POST['usuari']);;
    $stmt->bindParam('$password', $_POST['password']);
}

    if ($stmt->execute()) {
      $message = 'El usuari ha sigut creat';
    } else {
      $message = 'Ha hagut algun error';
    }
  }
  else{
      if (empty($usuari)) {
          $message = 'Ha de insertar el usuari';
    }else if(empty($pass)){
          $message = 'Ha de insertar la contrasenya';
	}else{
          $message = 'Ha de insertar tots els camps';
      }
  }

?>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Pagina Hotel| Iniciar Sessió </title>

    <link rel="stylesheet" type="text/css" href="utilitats/css/font-awesome.css">

    <link rel="stylesheet" href="utilitats/css/style.css">

    </head>
    
    <body>
    
    <!-- ***** Carregador Inici ***** -->
    <?php
		 include 'includes/carregador.php';
	?>
    <!-- *** Preloader End *** -->
    
    
    <!-- *** Header Principal *** -->
	<?php
		 include 'includes/nav.php';
	?>
    <!-- *** Header Final *** -->
	<!-- *** Capçalera inici *** -->
	<?php
		 include 'includes/capsalera.php';
	?>
    <!-- *** Capçalera Final *** -->
	
	<div class="login">
	
	 <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
	
  <form action="registre.php" method="POST">
      <input name="usuari" type="text" placeholder="Entra el usuari">
      <input name="password" type="password" placeholder="Entra el teu password">
	  <input name="cpassword" type="password" placeholder="Confirmar el password">
      <input type="submit" value="Submit">
  </form>
  
</div>
     <!-- *** Footer inici *** -->
     <?php
	 include 'includes/footer.php';
	?>
	<!-- *** Footer final *** -->

    <!-- jQuery -->
    <script src="utilitats/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="utilitats/js/popper.js"></script>
    <script src="utilitats/js/bootstrap.min.js"></script>

    <!-- Plugins afegits -->
    <script src="utilitats/js/scrollreveal.min.js"></script>
    <script src="utilitats/js/waypoints.min.js"></script>
    <script src="utilitats/js/jquery.counterup.min.js"></script>
    <script src="utilitats/js/imgfix.min.js"></script> 
    <script src="utilitats/js/mixitup.js"></script> 
    <script src="utilitats/js/accordions.js"></script>
    
    <!-- Fitxer nostre -->
    <script src="utilitats/js/custom.js"></script>

  </body>
</html>