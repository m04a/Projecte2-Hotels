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
  if (!empty($_POST['usuari']) && !empty($_POST['password']) && !empty($_POST['cpassword']) && 
    !empty($_POST['email'])) {
      $usuari = $_POST['usuari']; 
      validate($usuari);
	$password = $_POST['password'];
      validate($password);
	$passwordc = $_POST['cpassword']; 
      validate($passwordc);
    $email = $_POST['email']; 
if ($password != $passwordc) {
	$message = 'Les contrasenyes no son iguals';
	header("Location: registre.php");
  }else{
	
	$sql = "INSERT INTO usuario (usuari, password,email) VALUES ('$usuari','$password','email');";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam('$usuari', $_POST['usuari']);
    $stmt->bindParam('$password', $_POST['password']);
    $stmt->bindParam('$email', $_POST['email']);
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
	<section class="vh-100 bg-image">
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" id="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Crear un compte</h2>

              <form action="registre.php" method="POST">

                <div class="form-outline mb-4">
                  <input type="text" name="usuari" class="form-control form-control-lg" />
                  <label class="form-label">Nom</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" name="email" class="form-control form-control-lg" />
                  <label class="form-label">Correu electronic</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" />
                  <label class="form-label">Contrasenya</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="cpassword" id="form3Example4cdg" class="form-control form-control-lg" />
                  <label class="form-label">Confirma la contrasenya</label>
                </div>

                <div class="form-check d-flex justify-content-center mb-5">
                  <input
                    class="form-check-input me-2"
                    type="checkbox"
                    value=""
                  />
                  <label class="form-check-label" for="form2Example3g">
                    Estic d'acord <a href="#!" class="text-body"><u>Termes i condicions</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="button" class="btn btn-danger btn-block btn-lg gradient-custom-4 text-body">Registrar-te</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Tens una compte ja?? <a href="login.php" class="fw-bold text-body"><u>Fes login aquí</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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