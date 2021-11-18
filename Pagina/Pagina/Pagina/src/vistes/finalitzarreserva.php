<?php
session_start();
require '../includes/conectar_DB.php';

      if($_SESSION["tipo"]!="cliente"){
                header('Location: index.php?r=middleware');
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
                if(isset($_POST['nombre'])){
                $sql = "INSERT INTO reserva (numpers,idtipo,finicio,ffin,usuario,preciototal,canthab) VALUES (:npersones,:numhab,:desde,:hasta,:usuari,:preciototal,:nhabitacio)";
                //INSERT INTO reserva (numpers,idtipo,finicio,ffin,usuario) VALUES (1,1,'2021-08-10','2021-08-12','testt');
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':usuari', $usuari);
                $stmt->bindParam(':numhab', $numhab);
                $stmt->bindParam(':npersones', $npersones);
                $stmt->bindParam(':preciototal', $preciototal);
                $stmt->bindParam(':nhabitacio', $nhabitacio);
                /*Tienes que arreglar estos campos con la cosa de datetime, i faltan algunos campos*/
                $desde=DateTime::createFromFormat('j/m/Y', $from);
                $hasta=DateTime::createFromFormat('j/m/Y', $to);
                $stmt->bindParam(':desde', $desde->format('Y-m-d'));
                $stmt->bindParam(':hasta', $hasta->format('Y-m-d'));
}
$ultimareserva =$conn->query('SELECT MAX(numres) as ultimareserva FROM reserva')->fetchColumn();



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
  <table class='table table-dark table-hover table-responsive table-bordered'>
    <tr>
            <th colspan="2"><h3>Detalls reserva habitació</h3></th>
            <th colspan="2"><h3>Detalls reserva usuari</h3></th>

    </tr>
    <tr>
        
        <td>Nom d'habitació</td>
            <td><?php
            //$stmt->debugDumpParams();
            echo $nomhabitacio; ?></td>
            <td>Usuari</td>
            <td><?php echo $usuari; ?></td>
      
    </tr>
    <tr>
        <td>Data d'inici</td>
            <td><?php echo $from; ?></td>
            <td>Nom</td>
            <td><?php echo $nombre; ?></td>
    </tr>
   <tr>
        <td>Data final</td>
            <td><?php echo $to; ?></td>
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
            <td>Sexe</td>
         <td><?php if($sexo==0){echo 'Home';}else{echo 'Dona';} ?></td>
    </tr>
    <tr>
        <td>Preu per habitació</td>
            <td><?php echo $precio;?> €</td>
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
<div id="customers">
  <span>El numero de la teva reserva es nº<?php echo $ultimareserva; ?>.</span>
  <p><i class="fa fa-home mr-3"></i>Ciutat:  Figueres, GIRONA 17600</p>
            <p><i class="fa fa-envelope mr-3"></i>Email:  info@MKhotels.info</p>
            <p><i class="fa fa-phone mr-3"></i>Telefón: + 666 666 666 </p>
            <p><i class="fa fa-info mr-3"></i>Nom de la empresa HotelMK</p>
            <p><i class="fa fa-boat mr-3"></i>CIF: 15215156215</p>
            <p><i class="fa fa-boat mr-3"></i>CIF: 15215156215</p>
            <p>-----------------------------------------------------------------------</p>

    <table id="tab_customers" class="table table-striped">
        <colgroup>
            <col width="20%">
                <col width="20%">
                    <col width="20%">
                        <col width="20%">
        </colgroup>
            <tbody>
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
              <td>Sexe</td>
              <td><?php if($sexo==0){echo 'Home';}else{echo 'Dona';} ?></td>
            </tr>
            <tr>
                <td><?php echo $ultimareserva;?></td>
                <td></td>
                <td><h4>PREU TOTAL RESERVA</h4></td>
                <td><h2><?php echo $preciototal;?> €</h2></td>
            </tr>
            </tbody>
    </table>
    <p>Gracies per reservar amb nosaltres per accedir a la teva reserva has de utilitzar el teu usuari</p>
       <div class="row">
            <img src="../utilitats/imatges/LOGO.png">
            <p>HOTELS MK COPYRIGHT </p>
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