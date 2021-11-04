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
require '../includes/conectar_DB.php';
 
 
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
    $descripcion = $row['descripcion'];
    $imagen = $imagen['imagen'];
    $m2 = $m2['m2'];
    $persmax = $persmax['persmax'];
    $nom = $nom['nom'];
    
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
                    descripcion=:descripcion, 
                    precio=:precio,
                    WHERE idtipo = :idtipo";
 
        // prepare query for excecution
        $stmt = $conn->prepare($query);
 
        // posted values
        $descripcion=htmlspecialchars(strip_tags($_POST['descripcion']));
        $precio=htmlspecialchars(strip_tags($_POST['precio']));
        $>>>>>>borrame<<<<<<=htmlspecialchars(strip_tags($_POST['>>>>>>borrame<<<<<<']));
 
        // bind the parameters
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':>>>>>>borrame<<<<<<', $>>>>>>borrame<<<<<<);
        $stmt->bindParam(':idtipo', $idtipo);
 
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
        <td>idtipo</td>
            <td><input type='text' name='idtipo' value="<?php echo htmlspecialchars($idtipo, ENT_QUOTES);  ?>" class='form-control' /></td>
    </tr>
    <tr>
        <td>descripcion</td>
            <td><textarea name='descripcion' class='form-control'><?php echo htmlspecialchars($descripcion, ENT_QUOTES);  ?></textarea></td>
    </tr>
    <tr>
        <td>precio</td>
            <td><input type='text' name='precio' value="<?php echo htmlspecialchars($precio, ENT_QUOTES);  ?>" class='form-control' /></td>
    </tr>
    <tr>
        <td>>>>>>>borrame<<<<<<</td>
            <td><input type='text' name='>>>>>>borrame<<<<<<' value="<?php echo htmlspecialchars($>>>>>>borrame<<<<<<, ENT_QUOTES);  ?>" class='form-control' /></td>
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