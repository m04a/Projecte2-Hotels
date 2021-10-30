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
    $query = "SELECT usuari, password, nombre, apellidos, fechanacimiento, sexo, tipo, email FROM usuario WHERE usuari = ? LIMIT 0,1";

    $stmt = $conn->prepare($query);
 
    // this is the first question mark
    $stmt->bindParam(1, $usuari);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // values to fill up our form
    $usuari = $row['usuari'];
    $password = $row['password'];
    $nombre = $row['nombre'];
    //$apellidos = $row['apellidos'];
    //$fechanacimiento = $row['fechanacimiento'];
    //$sexo = $row['sexo'];
    //$tipo = $row['tipo'];
    //$email = $row['email'];
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
<?php
 
// check if form was submitted
if($_POST){
    try{
 
        // write update query
        // in this case, it seemed like we have so many fields to pass and
        // it is better to label them and not use question marks
        $query = "UPDATE usuario
                    SET nombre=:nombre,password=:password
                    WHERE usuari = :usuari";
                    /*apellidos=:apellidos,
                    fechanacimiento=:fechanacimiento,
                    sexo=:sexo, tipo=:tipo, 
                    email=:email
                    
                    /*, 
                    */
        // prepare query for excecution
        $stmt = $conn->prepare($query);
 
        // posted values
        $password=htmlspecialchars(strip_tags($_POST['password']));
        $nombre=htmlspecialchars(strip_tags($_POST['nombre']));
        //$apellidos=htmlspecialchars(strip_tags($_POST['apellidos']));
        //$fechanacimiento = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechanacimiento'])));
        //$sexo=htmlspecialchars(strip_tags($_POST['sexo']));
        //$tipo=htmlspecialchars(strip_tags($_POST['tipo']));
        //$email=htmlspecialchars(strip_tags($_POST['email']));
 
        // bind the parameters
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':usuari', $usuari);

       // $stmt->bindParam(':apellidos', $apellidos);
       // $stmt->bindParam(':fechanacimiento', $fechanacimiento);
       // $stmt->bindParam(':sexo', $sexo);
       // $stmt->bindParam(':tipo', $tipo);
       // $stmt->bindParam(':email', $email);
 
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
?>
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?usuari={$usuari}");?>" method="post">
 <table class='table table-hover table-responsive table-bordered'>
     <tr>
        <td>Contrasenya</td>
            <td><input type='password' name='password' value="<?php echo htmlspecialchars($password, ENT_QUOTES);  ?>" class='form-control'/></td>
    </tr>
    <tr>
        <td>Nom</td>
            <td><input type='text' name='nombre' value="<?php echo htmlspecialchars($nombre, ENT_QUOTES);  ?>" class='form-control' /></td>
    </tr>
   <!-- <tr>
        <td>Cognom</td>
            <td><input type='text' name='apellidos' value="<?php echo htmlspecialchars($apellidos, ENT_QUOTES);  ?>" class='form-control' /></td>
    </tr>
    <tr>
        <td>Data neixament</td>
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
    </tr> -->
    <tr>
        <td></td>
        <td>
            <input type='submit' value='Guardar Canvis' class='btn btn-primary' />
            <a href='llistarusuaris.php' class='btn btn-danger'>Tornar a Usuaris</a>
        </td>
    </tr>
</table> 
 </form>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<!-- confirm delete record will be here -->
 
</body>
</html>