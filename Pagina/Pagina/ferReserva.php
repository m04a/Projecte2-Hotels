<!DOCTYPE HTML>
<html>
<head>
    <title>Veure habitació - Admin</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <link rel="stylesheet" href="utilitats/css/style.css">
    <link rel="stylesheet" href="utilitats/css/font-awesome.css">
</head>
<body>
 <?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$numhab=isset($_GET['numhab']) ? $_GET['numhab'] : die('ERROR: Record ID not found.');

//include database connection
require 'includes/conectar_DB.php';
 
 
// read current record's data
try {
    // prepare select query
    $query = "SELECT numhab, precio, tipo, Descripcion, ocupada FROM habitacion WHERE numhab = ? LIMIT 0,1";

    $stmt = $conn->prepare( $query );
 
    // this is the first question mark
    $stmt->bindParam(1, $numhab);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // values to fill up our form
    $numhab = $row['numhab'];
    $Descripcion = $row['Descripcion'];
    $precio = $row['precio'];
    $ocupada = $row['ocupada'];
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
<div class="row" id="tabs">
              <div class="col-lg-4">
                <ul>
                  <li><a href='#tabs-1'><i class="fa fa-star"></i> Descripció</a></li>
                  <li><a href='#tabs-2'><i class="fa fa-gift"></i> Vacances Descripció</a></li>
                  <li><a href='#tabs-4'><i class="fa fa-info-circle"></i> Vacances Info</a></li>
                  <li><a href='#tabs-5'><i class="fa fa-phone"></i> Contacte</a></li>
                </ul>
              </div>
              <div class="col-lg-8">
                <section class='tabs-content' style="width: 100%;">
                  <article id='tabs-1'>
                    <h4>Nom habitació</h4>

                    <div class="row">
                       <div class="col-sm-6">
                            <p><?php echo htmlspecialchars($Descripcion, ENT_QUOTES);  ?></p>
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
                            <p><?php echo htmlspecialchars($numhab, ENT_QUOTES);?></p>
                       </div>
                    </div>
                  </article>
         <td>
            <a href='reservabuscador.php' class='btn btn-danger'>Tornar a Habitacions</a>
        </td>
        <!-- *** Footer inici *** -->
     <?php
     include 'includes/footer.php';
    ?>
    <!-- *** Footer final *** -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<!-- confirm delete record will be here -->
 
</body>
</html>