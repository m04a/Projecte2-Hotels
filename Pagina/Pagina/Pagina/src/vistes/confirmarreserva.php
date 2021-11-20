<?php
session_start();
require '../includes/conectar_DB.php';
include '../includes/crearReserva.php';

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
    <div class="container">
  <div class="row justify-content-center">
    <div class="col-sm">
<form action="index.php?r=confirmarreserva" method="post">
 <table class='table table-dark table-hover table-responsive table-bordered'>
    <tr>
            <th colspan="2"><h3>Revisa les teves dades de registre</h3>
                <?php if(!empty($missatge)){?><div class="alert alert-warning" role="alert"><?php echo $missatge;?></div><?php }?>
            </th>
    </tr>
    <tr>
        <td>Nom</td>
            <td><input type='text' name='nombre' value="<?php echo htmlspecialchars($nombre, ENT_QUOTES);  ?>" class='form-control' /></td>
    </tr>
   <tr>
        <td>Cognom</td>
            <td><input type='text' name='apellidos' value="<?php echo htmlspecialchars($apellidos, ENT_QUOTES);  ?>" class='form-control' /></td>
    </tr>
    <tr>
        <td>Data naixament</td>
            <td><input type='date' name='fechanacimiento' value="<?php echo htmlspecialchars($fechanacimiento, ENT_QUOTES);  ?>" class='form-control' /></td>
    </tr>
    <tr>
        <td>Sexe</td>
            <td>
                <select name="sexo" class='form-control'>
                        <option value="0">Home</option>
                        <option value="1">Dona</option>
                </select>
            </td>
    </tr>
    <tr>
        <td>Email</td>
            <td><input type='email' name='email' value="<?php echo htmlspecialchars($email, ENT_QUOTES);  ?>" class='form-control' /></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type='submit' name="treasure" value='Guardar Canvis' class='btn btn-secondary' />
        </td>
    </tr>
</table> 
 </form>

    </div>
   <div class="col-sm">
  <table class='table table-dark table-hover table-responsive table-bordered'>
    <tr>
            <th colspan="2"><h3>Dades de reserva</h3></th>
    </tr>
    <tr>
        <td>Nom d'habitació</td>
            <td><?php echo $_SESSION["nom"]; ?></td>
    </tr>
    <tr>
        <td>Data d'inici</td>
            <td><?php echo $_SESSION["from"]; ?></td>
    </tr>
   <tr>
        <td>Data final</td>
            <td><?php echo $_SESSION["to"]; ?></td>
    </tr>
    <tr>
        <td>Numero de habitacions</td>
            <td><?php echo $_SESSION["nhabitacio"];; ?></td>
    </tr>
    <tr>
        <td>Numero de persones</td>
            <td><?php echo $_SESSION["npersones"]; ?></td>
    </tr>
    <tr>
        <td>Preu per habitació</td>
            <td><?php echo $_SESSION["precio"]; ?> €</td>
    </tr>
    <tr>
        <td>Reservar al usuari</td>
            <td><?php echo $_SESSION["usuari"]; ?></td>
    </tr>
</table> 
    </div>
  </div>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm">

        </div>
    </div>
</div>
<div class="card text-center text-white bg-dark">
    <div class="card-header">
    <tr>
        <td>Tarjeta de credit</td>
            <td><input type='text' name='cc' id="card" class='form-control' /></td>
    </tr>  </div>
  <div class="card-body">

<div class="card text-center text-white bg-dark">
  <div class="card-body">
        <form action='index.php?r=finalitzarreserva' method='post' onsubmit="validate()">
                                    <input type="hidden" name="nombre" value="<?php echo $nombre;?>" />
                                    <input type="hidden" name="apellidos" value="<?php echo $apellidos;?>" />
                                    <input type="hidden" name="fechanacimiento" value="<?php echo $fechanacimiento;?>" />
                                    <input type="hidden" name="sexo" value="<?php echo $sexo;?>" />
                                    <input type="hidden" name="email" value="<?php echo $email;?>"/>
                                     <button type="submit" class='btn btn-success mybuttoncool m-r-6em'>Confirmar reserva</button>
                                <a href="reservabuscador.php" class='btn btn-danger'>Tornar a reserves</a>
                            </form>
  </div>
</div>
</div>
</div>
     <!-- *** Footer inici *** -->
     <?php
	 include '../includes/footer.php';
	?>
    
	<!-- *** Footer final *** -->
    <script src="../utilitats/js/custom.js"></script>
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