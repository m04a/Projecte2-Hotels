<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Pagina Hotel| Reservar </title>

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

<!-- *** Reserva Final *** -->
<!-- *** Calendari Inici *** -->

<?php
   include '../includes/recercaReserva.php';
  ?>
<!-- *** Reserva final *** -->
 <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>
<?php
    require '../includes/conectar_DB.php';
    include '../includes/buscadorReserva.php';
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

                            <h4><?php echo "<tr><td>{$nom}</td>";
                            //print_r($vacas) ?></h4>
                            <p>
                                <i class="fa fa-info-circle"></i><?php echo "<tr><td> {$descripcion}</td>";
                                //$stmt3->debugDumpParams(); ?>
                            </p>
                            <p>
                                <i class="fa fa-bed"></i>
                                <?php echo "<tr><td>{$disponible} habitacions disponibles</td>"; ?>
                            </p>
                            <ul class="social-icons">
                                <li> 
                                    <?php echo "<form action='index.php?r=ferReserva' method='post'>";?>
                                    <input type="hidden" name="desde" value="<?php echo $from;?>" />
                                    <input type="hidden" name="fins" value="<?php echo $to;?>" />
                                    <input type="hidden" name="nhabitacio" value="<?php echo $nhabitacio;?>" />
                                    <input type="hidden" name="npersones" value="<?php echo $npersones;?>" />
                                    <input type="hidden" name="idtipo" value="<?php echo $idtipo;?>" />

                                    <div class="row">
                                         <div class="col-6">
                                            <button type="submit" class='btn btn-info m-r-6em'>Reservar</button>
                                        </div>
                                         <div class="col-6">
                                        <p>Habitacions: <?php echo $nhabitacio;?> </p>
                                        <p>Persones: <?php echo $npersones;?></p>
                                         </div>
                                    </div>
                                    <div class="alert alert-success" role="alert">
                                    De: <?php echo $from;?> | Fins: <?php echo $to;?>
                                    </div>
                                    <?php if($disponible<5){ ?>
                                        <div class="alert alert-danger" role="alert">
                                        <h4><tr><td><i class="fa fa-exclamation-circle"></i> 
                                        <?php if($disponible==1){ 
                                                echo("Queda nomes 1 habitació ");
                                            }else{
                                                echo ("Queden nomes $disponible habitacions ") ;
                                            } ?>d'aquest tipus</td></h4>
                                        </div>
                                    <?php } ?>
                            
                                    </form>
                                </li>  
                            </ul>
                        </div>
                    </div>
                </div>

               
            <?php
        }
            }
 echo '</div>';
          }
          else{ echo'<div class="alert alert-danger" role="alert">Revisa que tots els camps estiguin omplerts!</div>'; }
          }
    ?> 
     </div>
   </section>
 </div>
     <!-- *** Footer inici *** -->

     <?php
	 include '../includes/footer.php';
	?>

<!-- *** Reserva final *** -->

     <!-- *** Footer inici *** -->
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