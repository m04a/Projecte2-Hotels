<?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
       
//include database connection
require '../includes/conectar_DB.php';
include '../includes/ferReserva.php';

 
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Veure habitació - Admin</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='shortcut icon' type='image/x-icon' href='../utilitats/imatges/favicon.ico' />
    <link rel="stylesheet" href="../utilitats/css/style.css">
    <link rel="stylesheet" href="../utilitats/css/font-awesome.css">
</head>
<body>
 
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
<div class="row" id="tabs">
              <div class="col-lg-4">
                <ul>
                  <li><a href='#tabs-1'><i class="fa fa-star"></i> Descripció</a></li>
                  <li><a href='#tabs-2'><i class="fa fa-info-circle"></i> Imatges</a></li>
                  <li><a href='#tabs-3'><i class="fa fa-phone"></i> Extres</a></li>
                </ul>
              </div>
              <div class="col-lg-8">
                <section class='tabs-content' style="width: 100%;">
                  <article id='tabs-1'>
                    <h4><?php echo htmlspecialchars($nom, ENT_QUOTES);?></h4>

                    <div class="row">
                       <div class="col-sm-6">
                            <p><?php echo htmlspecialchars($descripcion, ENT_QUOTES);  ?></p>
                       </div>

                       <div class="col-sm-6">
                            <p>Piscina Incluida</p>
                       </div>

                       <div class="col-sm-6">
                            <p>Cuina Totalment equipada</p>
                       </div>

                       <div class="col-sm-6">
                            <p>Aire acondicionat</p>
                       </div>

                       <div class="col-sm-6">
                            <p></p>
                       </div>
                    </div>
                  </article>
                   <article id='tabs-2'>
                    <div class="container">
  <div class="row">
    <a href="../utilitats/imatges/habitacio1.jpg"  data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
      <img src="../utilitats/imatges/habitacio1.jpg" class="img-fluid rounded">
    </a>
    <a href="../utilitats/imatges/habitacio2.jpg" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
      <img src="../utilitats/imatges/habitacio2.jpg"  class="img-fluid rounded" >
    </a>
    <a href="../utilitats/imatges/habitacio3.jpg" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
      <img src="../utilitats/imatges/habitacio3.jpg" class="img-fluid rounded">
    </a>
  </div>
</div>
                  </article>
                   <article id='tabs-3'>
                    <div class="container">
              <p>𝔸𝕚𝕣𝕖 𝕒𝕔𝕠𝕟𝕕𝕚𝕔𝕚𝕠𝕟𝕒𝕥</p>
              <p>𝕎𝕚𝕗𝕚</p>
               <p>𝕊𝕖𝕣𝕧𝕖𝕚 𝕕𝕖 𝕓𝕣𝕖𝕒𝕜𝕗𝕒𝕤𝕥</p>
                  </article>
              </section>
          </div>
      </div>
  </div>
</section>
<div class="card text-center text-white bg-dark">
  <div class="card-body">
    <!-- en caso de que se vaya a esta pagina desde reserva con una fecha establecida permitira avanzar con la reserva
  en caso de que se vaya desde habitacion (sin fecha "hasta") permitira volver a habitaciones -->
    <?php if (isset($to)){
      ?>
      <div class="card-header">
        <p>Reservar habitació <?php echo htmlspecialchars($nom, ENT_QUOTES);?> el següent interval: 
    <?php echo $from; echo ' - '; echo $to; echo ' | '; echo 'Numero de persones: '; echo $npersones; echo ' | Numero de habitacions : '; echo $nhabitacio; ?> </p>

<!-- envia los datos a confirmarreserva  -->
  </div>
      
                                <a href="index.php?r=reservabuscador" class='btn btn-danger'>Tornar a reserves</a>
                                 <form action='index.php?r=confirmarreserva' method='post'>
                                    <input type="hidden" name="desde" value="<?php echo $from;?>" />
                                    <input type="hidden" name="fins" value="<?php echo $to;?>" />
                                    <input type="hidden" name="nhabitacio" value="<?php echo $nhabitacio;?>" />
                                    <input type="hidden" name="npersones" value="<?php echo $npersones;?>" />
                                    <input type="hidden" name="numhab" value="<?php echo $numhab;?>" />
                                    <input type="hidden" name="nom" value="<?php echo $nom;?>" />
                                    <input type="hidden" name="precio" value="<?php echo $precio;?>" />
                                  
                                            <button type="submit" class='btn btn-primary mybuttoncool m-r-6em '>Reservar</button> 
                                          </form>
                    <?php } else{ ?>
                 <a href="index.php?r=habitacions" class='btn btn-danger'>Tornar a habitacions</a>
         <?php
         }
  ?>
  </div>
  <div class="card-footer text-muted">
    Si tens algun dubte fes-ho saber
  </div>
</div>
         <td>
        </td>
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


<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>

<!-- confirm delete record will be here -->
 
</body>
</html>