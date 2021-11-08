<!DOCTYPE html>
  <?php

require '../includes/conectar_DB.php';
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
      $fechanacimento = $_POST['fechanacimento'];
      validate($fechanacimento);



if ($password != $passwordc) {
	$message = 'Les contrasenyes no son iguals';
	header("Location: registre.php");
  }else{
	  // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

	
    $sql = "INSERT INTO usuario (usuari,password,nombre,apellidos,email,fechanacimento) VALUES ('$usuari','$password','$nombre','$apellidos','$email','$fechanacimento');";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam('$usuari', $_POST['usuari']);
    $stmt->bindParam('$password', $_POST['password']);
    $stmt->bindParam('$email', $_POST['email']);
    $stmt->bindParam('$nombre', $_POST['nombre']);
    $stmt->bindParam('$apellidos', $_POST['apellidos']);
    $fechanacimiento = date('Y-m-d', strtotime(str_replace('-', '/', $fechanacimiento))); 
    $stmt->bindParam('$fechanacimiento', $_POST['fechanacimiento']);}
    echo $fechanacimiento;

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

    <link rel="stylesheet" type="text/css" href="../utilitats/css/font-awesome.css">

    <link rel="stylesheet" href="../utilitats/css/style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    
    <body>
    
    <!-- ***** Carregador Inici ***** -->
    <?php
		 include '../includes/carregador.php';
	?>
    <!-- *** Preloader End *** -->
    
    
    <!-- *** Header Principal *** -->
	<?php
		 include '../includes/nav.php';
	?>
    <!-- *** Header Final *** -->
	<!-- *** Capçalera inici *** -->
	<?php
		 include '../includes/capsalera.php';
	?>
    <!-- *** Capçalera Final *** -->
	<section>
  <div class="mask align-items-center h-100 gradient-custom-3">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card text-white bg-secondary" id="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Crear un compte</h2>
              <form method="POST">
                 <?php if(!empty($message)): ?>
                  <div class='alert alert-warning'> <?= $message ?> </div>
                  <?php endif; ?>
                 <div class="form-outline mb-4">
                 <label class="form-label">Nom</label>
                  <input type="text" name="nombre" class="form-control form-control-lg" />
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label">Cognom</label>
                  <input type="text" name="apellidos" class="form-control form-control-lg" />
                </div> 
                  <div class="form-outline mb-4">
                  <label class="form-label">Nom d'usuari</label>
                  <input type="text" name="usuari" class="form-control form-control-lg" />
                </div>
                 <div class="form-outline mb-4">
                  <label class="form-label">Data de naixament</label>
                  <input type="date" name="fechanacimento" class="form-control form-control-lg" /> 
                </div>
                <div class="form-outline mb-4">
                  <label class="form-label">Correu electronic</label>
                  <input type="email" name="email" class="form-control form-control-lg" />
                </div> 

                <div class="form-outline mb-4">
                  <label class="form-label">Contrasenya</label>
                  <input type="password" name="password" class="form-control form-control-lg" />
                </div> 

                <div class="form-outline mb-4">
                  <label class="form-label">Confirma la contrasenya</label>
                  <input type="password" name="passwordc" class="form-control form-control-lg" />
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" name="Submit1" class="btn btn-danger btn-block btn-lg gradient-custom-4 text-body">Registrar-te</button>
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
	 include '../includes/footer.php';
	?>
	<!-- *** Footer final *** -->

    <!-- jQuery -->
    <script src="../utilitats/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../utilitats/js/popper.js"></script>
    <script src="../utilitats/js/bootstrap.min.js"></script>

    <!-- Plugins afegits -->
    <script src="../utilitats/js/scrollreveal.min.js"></script>
    <script src="../utilitats/js/waypoints.min.js"></script>
    <script src="../utilitats/js/jquery.counterup.min.js"></script>
    <script src="../utilitats/js/imgfix.min.js"></script> 
    <script src="../utilitats/js/mixitup.js"></script> 
    <script src="../utilitats/js/accordions.js"></script>
    
    <!-- Fitxer nostre -->
    <script src="../utilitats/js/custom.js"></script>

  </body>
</html>