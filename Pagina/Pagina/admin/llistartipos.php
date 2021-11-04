<!DOCTYPE HTML>
<html>
<head>
    <title>Llistar tipos - Admin</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <link rel="stylesheet" href="adminstyle.css">

</head>
<body>
 
    <!-- container -->
    <div class="container">
 
        <div class="page-header">
            <h1>tipos</h1>
        </div>
 
        <?php
// fem un include de la nostre base de dades
   require '../includes/conectar_DB.php';
 
$action = isset($_GET['action']) ? $_GET['action'] : "";
 
// if it was redirected from delete.php
if($action=='deleted'){
    echo "<div class='alert alert-success'>Record was deleted.</div>";
} 
// select all data
$query = "SELECT idtipo, precio, imagen, m2, cantidad, persmax, descripcion, nom FROM tipo ORDER BY idtipo DESC";
$stmt = $conn->prepare($query);	
$stmt->execute();
 
// this is how to get number of rows returned
$num = $stmt->rowCount();
 
// link to create record form
echo "<a href='crear.php' class='btn btn-primary m-b-1em'>Crear un nou tipus</a>";
 
//check if more than 0 record found
if($num>0){
 
    //start table
echo "<table class='table table-hover table-responsive table-bordered'>";
 
    //creating our table heading
    echo "<tr>
        <th>Preu</th>
        <th>Imatge</th>
        <th>Metres cuadrats</th>
        <th>Cantitat d'habitacions</th>
        <th>Persones maximes</th>
        <th>Descripció</th>
        <th>Tipus</th>
        <th>Accions</th>

    </tr>";
 
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extract row
    // this will make $row['firstname'] to
    // just $firstname only
    extract($row);
 
    // creating new table row per record
    echo "<tr>
        <td>{$precio}</td>
        <td>{$imagen}</td>
        <td>{$m2}</td>
        <td>{$cantidad}</td>
        <td>{$persmax}</td>
        <td>{$descripcion}</td>
        <td>{$nom}</td>
        <td>";
            // read one record
            echo "<a href='veure-un.php?idtipo={$idtipo}' class='btn btn-info m-r-1em'>Llegir</a>";
 
            // we will use this links on next part of this post
            echo "<a href='actualitzar.php?idtipo={$idtipo}' class='btn btn-primary m-r-1em'>Editar</a>";
 
            // we will use this links on next part of this post
            echo "<a href='#' onclick='esborrar({$idtipo});'  class='btn btn-danger'>Esborrar</a>";
        echo "</td>";
    echo "</tr>";
}
 
// end table
echo "</table>";
 
}
 
// if no records found
else{
    echo "<div class='alert alert-danger'>No s'ha trobat dades.</div>";
}
?>
 
    </div> <!-- end .container -->
 
     <script type="text/javascript" src="admincustom.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<!-- confirm delete record will be here -->
 
</body>
</html>