<?php
session_start();
require '../includes/conectar_DB.php';
header('Location: '.$_SERVER['REQUEST_URI']);

      if($_SESSION["tipo"]!="cliente"){
                header('Location: middleware.php');
                }
                else{
                    $to = $_POST["desde"];
                    $from = $_POST["fins"];
                    $nhabitacio = $_POST["nhabitacio"];
                    $npersones = $_POST["npersones"];
                    $usuari= $_SESSION["usuari"];
                    try {
                    // prepare select query
                     $query = "SELECT nombre, apellidos, fechanacimiento, sexo, email FROM usuario WHERE usuari = '$usuari' LIMIT 0,1";

                     $stmt = $conn->prepare($query);
 
                    // this is the first question mark
                     $stmt->bindParam($usuari);
 
                         // execute our query
                     $stmt->execute();
 
                     // store retrieved row to a variable
                     $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
                    // values to fill up our form

                    $nombre = $row['nombre'];
                    $apellidos = $row['apellidos'];
                    $fechanacimiento = $row['fechanacimiento'];
                    $sexo = $row['sexo'];
                    $email = $row['email'];
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
if($_POST){
    try{
 
        // write update query
        // in this case, it seemed like we have so many fields to pass and
        // it is better to label them and not use question marks
        $query = "UPDATE usuario
                    SET nombre=:nombre,apellidos=:apellidos,
                    fechanacimiento=:fechanacimiento,sexo=:sexo,email=:email
                    WHERE usuari = '$usuari'";
                    
                    
                
        // prepare query for excecution
        $stmt = $conn->prepare($query);
 
        // posted values
        $password=htmlspecialchars(strip_tags($_POST['password']));
        $nombre=htmlspecialchars(strip_tags($_POST['nombre']));
        $apellidos=htmlspecialchars(strip_tags($_POST['apellidos']));
        $fechanacimiento = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechanacimiento'])));
        $sexo=htmlspecialchars(strip_tags($_POST['sexo']));
        $email=htmlspecialchars(strip_tags($_POST['email']));
 
        // bind the parameters
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':usuari', $usuari);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':fechanacimiento', $fechanacimiento);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':email', $email);
 
        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was updated.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
        }
 
    }
 
    // show errors
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
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
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 <table class='table table-hover table-responsive table-bordered'>
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
            <input type='submit' value='Guardar Canvis' class='btn btn-primary' />
            <a href='llistarusuaris.php' class='btn btn-danger'>Finalitzar reserva</a>
        </td>
    </tr>
</table> 
 </form>


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