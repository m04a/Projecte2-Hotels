<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Pagina Hotel| Reservar </title>

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

<!-- *** Reserva Final *** -->
<!-- *** Calendari Inici *** -->
<div class="buscador">

<label for="from">Des de</label>
<input type="text" id="from" name="from">
<label for="to">Fins a </label>
<input type="text" id="to" name="to">
<!-- *** Calendari Final *** -->

<!-- *** Seleccionar tipus habitació i numero persones Inici *** -->
<label for="tipus">Tipus d'habitació:</label>
  <select name="habitacio" id="habitacio">
    <option value="estandard">Estandard</option>
    <option value="premium">Premium</option>
    <option value="estandard2">Estandard doble</option>
	<option value="premium2">Premium doble</option>
  </select>
<!-- *** Seleccionar tipus habitació i numero persones Final *** -->
<label for="tipus">Numero de persones:</label>
  <select name="habitacio" id="habitacio">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
	<option value="4">4</option>
  </select>
  </div>
<!-- *** Reserva final *** -->


<!-- *** Reserva final *** -->

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