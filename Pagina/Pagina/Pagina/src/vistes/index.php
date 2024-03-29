<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link rel='shortcut icon' type='image/x-icon' href='../utilitats/imatges/favicon.ico' />
    <title>Pagina Hotel| Hotel MK </title>

    <link rel="stylesheet" type="text/css" href="../utilitats/css/font-awesome.css">

    <link rel="stylesheet" href="../utilitats/css/style.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    
    <body> 
    
    <!-- ***** Carregadpr Inici ***** -->
    <?php
		 include '../includes/carregador.php';
	?>
    <!-- *** Carregador End *** -->
    
    
    <!-- *** Header Principal *** -->
	<?php
		 include '../includes/nav.php';
	?>
    <!-- *** Header Final *** -->

    <!-- *** Main Banner Area Start *** -->
     <div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="../utilitats/imatges/video.mp4" type="video/mp4" />
        </video>
            <div class="caption">
                <h6>Millor hotel de Figueres</h6>
                <h2>Hotels <em>MK</em></h2>
                <div class="main-button">
                    <a href="index.php?r=reservabuscador">Reserva Ara!</a>
                </div>
            </div>
        </div>
    </div>
    <!-- *** Main Banner Area End *** -->

   <!-- *** Hotels promocionats inici *** -->
   <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Habitacions <em>premiums</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Aquestes són habitacions que tenim en venta, si vols més inforamcó només has de clicar en veure més.</p>
                    </div>
                </div>
            </div>
            <!-- dos habitaciones fijas de ejemplo -->
            <div class="row">
               <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="../utilitats/imatges/product-3-720x480.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <sup>50€</sup>
                            </span>

                            <h4>Habitació Individual</h4>

                            <p>
                                Per persones solitaries
                            </p>

                            <ul class="social-icons">
                                <li><a href="index.php?=habitacions">+ Veure més</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="../utilitats/imatges/habitacio2.jpg" alt="">
                        </div>
                        <div class="down-content">
                            <span>
                                <sup>100€</sup>
                            </span>

                            <h4>Habitació doble estandard</h4>

                            <p>
                                 Per parelles i barat
                            </p>


                            <ul class="social-icons">
                                <li><a href="index.php?=habitacions">+ Veure més</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            <br>
        </div>
    </section>
    <!-- *** Hotels promocionats final *** -->
	
    <!-- *** Qui som inici *** -->

    <!-- *** Qui som inici *** -->
   
    
    <!-- *** Footer inici *** -->
     <?php
	 include '../includes/footer.php';
	?>
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