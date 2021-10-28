<!DOCTYPE HTML>
<html>
<head>
    <title>Veure habitació - Admin</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <link rel="stylesheet" href="adminstyle.css">

</head>
<body>
 <?php
// get passed parameter value, in this case, the record ID
// isset() is a PHP function used to verify if a value is there or not
$numhab=isset($_GET['numhab']) ? $_GET['numhab'] : die('ERROR: Record ID not found.');

//include database connection
require '../includes/conectar_DB.php';
 
 
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
<?php
 
// check if form was submitted
if($_POST){
 
    try{
 
        // write update query
        // in this case, it seemed like we have so many fields to pass and
        // it is better to label them and not use question marks
        $query = "UPDATE habitacion
                    SET Descripcion=:Descripcion, precio=:precio, ocupada=:ocupada
                    WHERE numhab = :numhab";
 
        // prepare query for excecution
        $stmt = $conn->prepare($query);
 
        // posted values
        $Descripcion=htmlspecialchars(strip_tags($_POST['Descripcion']));
        $precio=htmlspecialchars(strip_tags($_POST['precio']));
        $ocupada=htmlspecialchars(strip_tags($_POST['ocupada']));
 
        // bind the parameters
        $stmt->bindParam(':Descripcion', $Descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':ocupada', $ocupada);
        $stmt->bindParam(':numhab', $numhab);
 
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
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?numhab={$numhab}");?>" method="post">
 <table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>numhab</td>
            <td><input type='text' name='numhab' value="<?php echo htmlspecialchars($numhab, ENT_QUOTES);  ?>" class='form-control' /></td>
    </tr>
    <tr>
        <td>Descripcion</td>
            <td><textarea name='Descripcion' class='form-control'><?php echo htmlspecialchars($Descripcion, ENT_QUOTES);  ?></textarea></td>
    </tr>
    <tr>
        <td>precio</td>
            <td><input type='text' name='precio' value="<?php echo htmlspecialchars($precio, ENT_QUOTES);  ?>" class='form-control' /></td>
    </tr>
    <tr>
        <td>ocupada</td>
            <td><input type='text' name='ocupada' value="<?php echo htmlspecialchars($ocupada, ENT_QUOTES);  ?>" class='form-control' /></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type='submit' value='Guardar Canvis' class='btn btn-primary' />
            <a href='llistarhabitacions.php' class='btn btn-danger'>Tornar a Habitacions</a>
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