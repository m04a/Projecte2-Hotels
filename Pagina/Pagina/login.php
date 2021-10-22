  <?php

require 'includes/conectar_DB.php';

$usuari = $_POST['usuari']; 
$password = $_POST['password']; 

$sql= "SELECT tipo FROM usuario WHERE usuari='$usuari' AND password='$password' LIMIT 1;";

$rol = $conn->query($sql);

    while($row = $rol->fetch_assoc()) {
        if($row['rol']=='cliente'){
            header('Location:/index.php');
        } else{
            header('Location:admin/admin.php');
        }
        
    }
 ?>
<!DOCTYPE html>
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
   <form action="includes/loginuser.php" method="POST">
      <input name="usuari" type="text" placeholder="Entra el usuari">
      <input name="password" type="password" placeholder="Entra el teu password">
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