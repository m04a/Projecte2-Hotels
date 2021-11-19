<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Pagina Hotel| Termes Configuració </title>

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
  <?php
// fem un include de la nostre base de dades
require '../includes/conectar_DB.php';
   
session_start();

$usuari = $_SESSION["usuari"];

// if it was redirected from delete.php
if($action=='deleted'){
    echo "<div class='alert alert-success'>Record was deleted.</div>";
} 
// select all data
$query = "SELECT numpers,idtipo,finicio,ffin,usuario,preciototal,canthab, FROM reserva WHERE usuario='$usuari' ORDER BY idtipo DESC";
$stmt = $conn->prepare($query); 
$stmt->execute();
 
// this is how to get number of rows returned
$num = $stmt->rowCount();
$ultimareserva =$conn->query('SELECT MAX(numres) as ultimareserva FROM reserva')->fetchColumn();


// link to create record form
echo "<a href='crear.php' class='btn btn-primary m-b-1em'>Crear un nou tipus</a>";
 
//check if more than 0 record found
if($num>0){
 
    //start table
echo "<table class='table table-dark table-hover table-responsive table-bordered'>";
 
    //creating our table heading
    echo "<tr>
        <th>Numero de persones</th>
        <th>Numero de habitacions</th>
        <th>Metres cuadrats</th>
        <th>Cantitat d'habitacions</th>
        <th>Persones maximes</th>
        <th>Persones maximes</th>
        <th>Persones maximes</th>
    </tr>";
 
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extract row
    // this will make $row['firstname'] to
    // just $firstname only
    extract($row);
    $idtipo=$row['idtipo'];
    $nomtipus =$conn->query('SELECT nom FROM tipo WHERE idtipo="$idtipo"')->fetchColumn();
    echo $nomtipus;
    // creating new table row per record
    echo "<tr>
        <td>{$numpers}</td>
        <td>{$canthab}</td>
        <td>$nomtipus</td>
        <td>{$finicio}</td>
        <td>{$ffin}</td>
        <td>{$preciototal}</td>
        <td>";
 
            // we will use this links on next part of this post
            echo "<a href='#' onclick='esborrar({$idtipo});'  class='btn btn-danger'>Esborrar</a>";
        echo "</td>";
    echo "</tr>";
}
 
// end table
echo "</table>";
 
}
 
// if no records found
else{
    echo "<div class='alert alert-danger'>No s'ha trobat dades.</div>";
}
?>
 
    </div> <!-- end .container -->
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