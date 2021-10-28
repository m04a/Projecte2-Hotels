<!DOCTYPE html>
  <?php

require 'includes/conectar_DB.php';
  $message = '';
	function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
}
  if (!empty($_POST['usuari']) && !empty($_POST['password']) && !empty($_POST['cpassword'])) {
      $usuari = $_POST['usuari']; 
      validate($usuari);
	$password = $_POST['password'];
      validate($password);
	$passwordc = $_POST['cpassword']; 
      validate($passwordc);
if ($password != $passwordc) {
	$message = 'Les contrasenyes no son iguals';
	header("Location: registre.php");
  }else{
	
	$sql = "INSERT INTO usuario (usuari, password) VALUES ('$usuari','$password');";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam('$usuari', $_POST['usuari']);
    $stmt->bindParam('$password', $_POST['password']);
}

    if ($stmt->execute()) {
      $message = 'El usuari ha sigut creat';
    } else {
      $message = 'Ha hagut algun error';
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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
    <div class="container register-form">
            <form action="registre.php" method="POST">
            <div class="form">
                <div class="note">
                    <p>This is a simpleRegister Form made using Boostrap.</p>
                </div>

                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="usuari"class="form-control" placeholder="Usuari" value=""/>
                            </div>
                            <div class="form-group">
                                <input name="password" type="password" class="form-control" placeholder="Password" value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="cpassword" type="password" class="form-control" placeholder="Your Password *" value=""/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Confirm Password *" value=""/>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btnSubmit">Registrar</button>
                </div>
            </div>
        </div>
      </form>
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