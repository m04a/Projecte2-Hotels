<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Pagina Hotel| Termes i condicions </title>

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
 <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>
<?php
   require '../includes/conectar_DB.php';
   //Hem de posar les condicions corresponentes
    /*HABITACIÓ NO TOPA AMB EL PERIODE DE VACANCES DEL HOTEL
HI HAN SUFICIENTS HABITACIONS DE CADA TIPUS
LA HABITACIÓ NO ESTÁ RESERVADA EN ELS PERIODES DEMANATS **/
    $query = "SELECT idtipo,precio,descripcion,nom FROM tipo ORDER BY idtipo DESC";
    $stmt = $conn->prepare($query); 
    $stmt->execute();
    echo '<div class="row">';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row); 
          
        ?>
    
         <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="../utilitats/imatges/product-2-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <sup>€</sup> <?php echo "<tr><td>{$precio}</td>"; ?>
                            </span>

                            <h4><?php echo "<tr><td>{$nom}</td>"; ?></h4>

                            <p>
                                <i class="fa fa-info"></i><?php echo "<tr><td>{$descripcion}</td>"; ?>
                            </p>
                            <ul class="social-icons">
                            <li>
                                <?php echo "<form action='index.php?r=ferReserva' method='post'>";?>
                                <input type="hidden" name="idtipo" value="<?php echo $idtipo;?>" />
                                <button type="submit" class='btn btn-info m-r-6em'>Llegir</button>
                                </form>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>

               
            <?php
            }
 echo '</div>';
    ?> 
     </div>
   </section>
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