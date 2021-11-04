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
				$idtipo=$_POST['idtipo'];
				$precio=$_POST['precio'];
				$imagen=$_POST['imagen'];
                $m2=$_POST['m2'];
				$cantidad=$_POST['cantidad'];
				$descripcion=$_POST['descripcion'];
                $nom=$_POST['nom'];
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>
 
 <table class='table table-hover table-responsive table-bordered'>
    <tr>
        <td>Preu</td>
        <td><?php echo htmlspecialchars($precio, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Imatge</td>
        <td><?php echo htmlspecialchars($imagen, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Metres cuadrats</td>
        <td><?php echo htmlspecialchars($m2, ENT_QUOTES);  ?></td>
    </tr>
         <tr>
        <td>Cantitat</td>
        <td><?php echo htmlspecialchars($cantidad, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Descripcio</td>
        <td><?php echo htmlspecialchars($descripcion, ENT_QUOTES);  ?></td>
    </tr>
    <tr>
        <td>Nom</td>
        <td><?php echo htmlspecialchars($nom, ENT_QUOTES);  ?></td>
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