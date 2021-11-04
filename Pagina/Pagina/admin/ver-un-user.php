<!DOCTYPE HTML>
<html>
<head>
    <title>Veure usuari - Admin</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <link rel="stylesheet" href="adminstyle.css">

</head>
<body>
 <?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$usuari=isset($_GET['usuari']) ? $_GET['usuari'] : die('ERROR: Record ID not found.');

//include database connection
require '../includes/conectar_DB.php';
 
 
// read current record's data
try {
    // prepare select query
    $query = "SELECT usuari, nombre, apellidos, fechanacimiento, sexo, tipo, email FROM usuario WHERE usuari = ? LIMIT 0,1";

    $stmt = $conn->prepare( $query );
 
    // this is the first question mark
    $stmt->bindParam(1, $usuari);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // values to fill up our form
    $usuari = $row['usuari'];
    $nombre = $row['nombre'];
    $apellidos = $row['apellidos'];
    $fechanacimiento = $row['fechanacimiento'];
	$sexo = $row['sexo'];
    $tipo = $row['tipo'];
    $email = $row['email'];
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
 
 <table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>Usuari:</td>
        <td><?php echo htmlspecialchars($usuari, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Nom:</td>
        <td><?php echo htmlspecialchars($nombre, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Cognom:</td>
        <td><?php echo htmlspecialchars($apellidos, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Data neixament:</td>
        <td><?php echo htmlspecialchars($fechanacimiento, ENT_QUOTES);  ?></td>
    </tr>
	 <tr>
        <td>Sexe:</td>
        <td><?php 
			if ($sexo="0"){
				echo("Home");
			}else{
				echo("Dona");
			}
			 ?></td>
    </tr>
    <tr>
        <td>Tipus:</td>
        <td><?php echo htmlspecialchars($tipo, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><?php echo htmlspecialchars($email, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <a href='llistarusuaris.php' class='btn btn-danger'>Tornar a tipos</a>
        </td>
    </tr>
</table> 
 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<!-- confirm delete record will be here -->
 
</body>
</html>