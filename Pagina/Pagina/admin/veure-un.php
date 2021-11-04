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
    $descripcion = $row['descripcion'];
    $precio = $row['precio'];
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
 
 <table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>idtipo</td>
        <td><?php echo htmlspecialchars($idtipo, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>descripcion</td>
        <td><?php echo htmlspecialchars($descripcion, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>precio</td>
        <td><?php echo htmlspecialchars($precio, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Esta >>>>>>borrame<<<<<<?:</td>
        <td><?php 
			if ($>>>>>>borrame<<<<<<="0"){
				echo("No");
			}else{
				echo("Si");
			}
			 ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <a href='llistartipos.php' class='btn btn-danger'>Tornar a tipos</a>
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