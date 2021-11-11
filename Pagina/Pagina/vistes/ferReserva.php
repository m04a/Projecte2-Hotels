<?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$numhab=isset($_GET['idtipo']) ? $_GET['idtipo'] : die('ERROR: Record ID not found.');

//include database connection
require '../includes/conectar_DB.php';
 
 
// read current record's data
try {
    // prepare select query
    $query = "SELECT nom,descripcion,precio,m2 FROM tipo WHERE idtipo = ? LIMIT 0,1";

    $stmt = $conn->prepare( $query );
 
    // this is the first question mark
    $stmt->bindParam(1, $numhab);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // values to fill up our form
    $nom  = $row['nom'];
    $descripcion = $row['descripcion'];
    $precio = $row['precio'];
    $m2 = $row['m2'];
    $to = $_POST["fins"];
    $from = $_POST["desde"];
    $nhabitacio = $_POST["nhabitacio"];
    $npersones = $_POST["npersones"];

}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Veure habitació - Admin</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
 
                  </article>
              </section>
          </div>
      </div>
  </div>
</section>
<div class="card text-center text-white bg-dark">
  <div class="card-body">
    <?php if (isset($to)){
      ?>
      <div class="card-header">
        <p>Reservar habitació <?php echo htmlspecialchars($nom, ENT_QUOTES);?> el següent interval: 
    <?php echo $from; echo ' - '; echo $to; echo ' | '; echo 'Numero de persones: '; echo $npersones; echo 'Numero de habitacions : '; echo $nhabitacio; ?> </p>


  </div>
      
                                <a href="reservabuscador.php" class='btn btn-danger'>Tornar a reserves</a>
                                 <form action='confirmarreserva.php' method='post'>
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
                 <a href="habitacions.php" class='btn btn-danger'>Tornar a habitacions</a>
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