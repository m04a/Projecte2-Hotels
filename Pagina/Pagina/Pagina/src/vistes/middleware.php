<?php
header('Refresh:5; URL=index.php?r=index');       
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Pagina Hotel| Se te redidirigira en... </title>

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

    <div class="alert alert-danger" role="alert">
    La pagina que intentes accedir requereix iniciar sessió has iniciat sessió o no estas registrat, se té redigirà automaticament. <a href="index.php?r=login"> Si no redirigeix dona clic aqui </a>
    </div>

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