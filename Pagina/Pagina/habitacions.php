<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Pagina Hotel| Termes i condicions </title>

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
 <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>
  <?php

require 'includes/conectar_DB.php';
 $sql = "SELECT * FROM tipushabitacio";
                             $tipus_habitacions = $conn->query($sql);
                             while($row = $tipus_habitacions->fetch_assoc()) {
                                if($row['id_tipus']==1){
                                    $img = 'exemple1';
                                }
                                else if ($row['id_tipus']==1) {
                                    $img = 'exemple2.jpg';
                                }
                                 else {
                                    $img = 'habitacio_doble.jpg';
                                }
					print '<div class="row">';
						print '<div class="col-lg-4">';
							print '<div class="trainer-item">';
								print '<div class="image-thumb">';
									print '<img src="cambiar.jpg" alt="">';
								print '</div>';
								print '<div class="down-content">';
									print '<span>';
										print '<sup>€</sup>500.00 - <sup>€</sup>700.00';
									print '</span>';
								print '<h4>".$row['nom_tipus']."</h4>';					
								print '<p>';
									print '<i class="fa fa-info"></i> Descripció de la nostra habitació';
								print '</p>';
							print '<ul class="social-icons">';
								print '<li><a href="habitaciodemanada.php">+ Més informació</a></li>';
							print '</ul>';
								print '</div>';
							print '</div>';
						print '</div>';
					print '</div>';
							 }
?>       
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