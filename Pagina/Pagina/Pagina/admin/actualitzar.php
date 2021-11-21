<!DOCTYPE HTML>
<html>
<head>
    <title>Veure tipus - Admin</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <link rel="stylesheet" href="adminstyle.css">

</head>
<body>
 <?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$idtipo=isset($_GET['idtipo']) ? $_GET['idtipo'] : die('ERROR: Record ID not found.');

//include database connection
require 'conectar_DB.php';
require 'middleware.php';    

 
 
// read current record's data
try {
    // prepare select query
    $query = "SELECT idtipo, precio, imagen, m2, cantidad, persmax, descripcion, nom FROM tipo WHERE idtipo = ? LIMIT 0,1";

    $stmt = $conn->prepare( $query );
 
    // this is the first question mark
    $stmt->bindParam(1, $idtipo);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // values to fill up our form
    $idtipo = $row['idtipo'];
    $precio = $row['precio'];
    $imagen = $row['imagen'];
    $m2 = $row['m2'];
    $cantidad= $row['cantidad'];
    $persmax = $row['persmax'];
    $descripcion = $row['descripcion'];
    $nom = $row['nom'];
    
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
        $query = "UPDATE tipo
                    SET 
                    idtipo=:idtipo, 
                    precio=:precio, 
                    imagen=:imagen, 
                    m2=:m2, 
                    cantidad=:cantidad, 
                    persmax=:persmax, 
                    descripcion=:descripcion, 
                    nom=:nom
                    WHERE idtipo = :idtipo";
 
        // prepare query for excecution
        $stmt = $conn->prepare($query);
 
        // posted values
        $idtipo=$_POST['idtipo'];
        $precio=$_POST['precio'];
        $imagen=$_POST['imagen'];
        $m2=$_POST['m2'];
        $cantidad=$_POST['cantidad'];
        $persmax=$_POST['persmax'];
        $descripcion=$_POST['descripcion'];
        $nom=$_POST['nom'];
 
        // bind the parameters
        
        $stmt->bindParam(':idtipo', $idtipo);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':m2', $m2);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':persmax', $persmax);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':nom', $nom);
 
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
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?idtipo={$idtipo}");?>" method="post">
 <table class='table table-hover table-responsive table-bordered'>
         
    <tr>
        <td>Preu</td>
            <td><input type='number' name='precio' value="<?php echo htmlspecialchars($precio, ENT_QUOTES);  ?>" class='form-control' /></td>
    </tr>
     <tr>
        <td>Imatge</td>
            <td><input type='text' name='imagen' value="<?php echo htmlspecialchars($imagen, ENT_QUOTES);  ?>" class='form-control' /></td>
    </tr>
     <tr>
        <td>Metres cuadrats</td>
            <td><input type='number' name='m2' value="<?php echo htmlspecialchars($m2, ENT_QUOTES);  ?>" class='form-control' /></td>
    </tr>
     <tr>
        <td>Cantitat habitacions</td>
            <td><input type='number' name='cantidad' value="<?php echo htmlspecialchars($cantidad, ENT_QUOTES);  ?>" class='form-control' /></td>
    </tr>
     <tr>
        <td>Persones maximes</td>
            <td><input type='number' name='persmax' value="<?php echo htmlspecialchars($persmax, ENT_QUOTES);  ?>" class='form-control' /></td>
    </tr>
    <tr>
        <td>descripcion</td>
            <td><textarea name='descripcion' class='form-control'><?php echo htmlspecialchars($descripcion, ENT_QUOTES);  ?></textarea></td>
    </tr>
    <tr>
        <td>Nom del tipus</td>
            <td><input type='text' name='nom' value="<?php echo htmlspecialchars($nom, ENT_QUOTES);  ?>" class='form-control' /></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type='submit' value='Guardar Canvis' class='btn btn-primary' />
            <a href='llistartipos.php' class='btn btn-danger'>Tornar a tipos</a>
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