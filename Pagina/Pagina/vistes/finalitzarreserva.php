<?php
session_start();
require '../includes/conectar_DB.php';

      if($_SESSION["tipo"]!="cliente"){
                header('Location: middleware.php');
                }
                else{
                if(!isset($_SESSION['nombre']) && empty($_SESSION['nombre'])) {               
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $fechanacimiento = $_POST['fechanacimiento'];
                $sexo = $_POST['sexo'];
                $email = $_POST['email'];
                $_SESSION["nombre"] = $nombre;
                $_SESSION["apellidos"] = $apellidos;
                $_SESSION["fechanacimiento"] = $fechanacimiento;
                $_SESSION["sexo"] = $sexo;
                $_SESSION["email"] = $email;                
            }
                $nombre = $_SESSION["nombre"];
                $apellidos = $_SESSION["apellidos"];
                $fechanacimiento = $_SESSION["fechanacimiento"];
                $sexo = $_SESSION["sexo"];
                $email = $_SESSION["email"];
                $to = $_SESSION["to"];                                     
                $from = $_SESSION["from"];                     
                $nhabitacio = $_SESSION["nhabitacio"];
                $npersones = $_SESSION["npersones"];
                $precio = $_SESSION["precio"];
                $preciototal = $nhabitacio * $precio;
                $nomhabitacio = $_SESSION["nom"];
                $usuari = $_SESSION["usuari"];
                $numhab = $_SESSION["numhab"];
                echo $finicio;
                if(isset($_POST['nombre'])){
                $sql = "INSERT INTO reserva (numpers,idtipo,finicio,ffin) VALUES ('$npersones','$numhab','$from','$to');";
                $stmt = $conn->prepare($sql);
                //$stmt->bindParam('$usuari', $_POST['usuari']);
                $stmt->bindParam('$numhab', $_POST['numhab']);
                $stmt->bindParam('$npersones', $_POST['npersones']);
                /*Tienes que arreglar estos campos con la cosa de datetime, i faltan algunos campos*/
                $stmt->bindParam('$from', $_POST['from']);
                $stmt->bindParam('$to', $_POST['to']);


}

  }
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Pagina Hotel| Confirmar Reserva </title>

    <link rel="stylesheet" type="text/css" href="../utilitats/css/font-awesome.css">

    <link rel="stylesheet" href="../utilitats/css/style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>


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
    <div class="alert alert-success"><?php if ($stmt->execute()) {
                  echo "S'ha realitzat correctament la reserva";
                 } else {
                  echo "No s'ha pogut realitzar la reserva";
                 // header('Refresh: 5; URL=reservabuscador.php');  
                 } ?></div>
  <div class="container">
    <div class="row">
   <div class="col-sm">
  <div id="content">
  <table class='table table-dark table-hover table-responsive table-bordered'>
    <tr>
            <th colspan="2"><h3>Detalls reserva habitació</h3></th>
            <th colspan="2"><h3>Detalls reserva usuari</h3></th>

    </tr>
    <tr>
        
        <td>Nom d'habitació</td>
            <td><?php echo $nomhabitacio; ?></td>
            <td>Usuari</td>
            <td><?php echo $usuari; ?></td>
      
    </tr>
    <tr>
        <td>Data d'inici</td>
            <td><?php echo $to; ?></td>
            <td>Nom</td>
            <td><?php echo $nombre; ?></td>
    </tr>
   <tr>
        <td>Data final</td>
            <td><?php echo $from; ?></td>
            <td>Cognom</td>
            <td><?php echo $apellidos; ?></td>
    </tr>
    <tr>
        <td>Numero de habitacions</td>
            <td><?php echo $nhabitacio; ?></td>
            <td>Data de naixament</td>
            <td><?php echo $fechanacimiento; ?></td>
    </tr>
    <tr>
        <td>Numero de persones</td>
            <td><?php echo $npersones; ?></td>
            <td>Sexo</td>
            <td><?php if($sexo==0){echo 'Home';}else{echo 'Dona';} ?></td>
    </tr>
    <tr>
        <td>Preu per habitació</td>
            <td><?php echo $precio;?></td>
            <td>email</td>
            <td><?php echo $email;?></td>
    </tr>
    <tr>
            <th colspan="2"><h4>PREU TOTAL RESERVA</h4></th>
            <th colspan="2"><h2><?php echo $preciototal;?> €</h2></th>
    </tr>
</table> 
  </div>
    </div>
  </div>
</div>
<a href="javascript:crearPDF()" class="btn btn-primary">Imprimir PDF</a>


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