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
    $query = "SELECT numhab, precio, tipo, Descripcion, ocupada FROM habitacion WHERE numhab = '$numhab' LIMIT 0,1";

    $stmt = $con->prepare( $query );
 
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
 
 <table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>numhab</td>
        <td><?php echo htmlspecialchars($numhab, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Descripcion</td>
        <td><?php echo htmlspecialchars($Descripcion, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>precio</td>
        <td><?php echo htmlspecialchars($precio, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>ocupada</td>
        <td><?php echo htmlspecialchars($ocupada, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <a href='index.php' class='btn btn-danger'>Back to read products</a>
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