<!DOCTYPE HTML>
<html>
<head>
    <title>Llistar usuaris - Admin</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <link rel="stylesheet" href="adminstyle.css">

</head>
<body>
 
    <!-- container -->
    <div class="container">
 
        <div class="page-header">
            <h1>Usuaris</h1>
        </div>
 
        <?php
// fem un include de la nostre base de dades
   require 'conectar_DB.php';
   require 'middleware.php';	
$action = isset($_GET['action']) ? $_GET['action'] : "";
 
// delete message prompt will be here
 if($action=='deleted'){
    echo "<div class='alert alert-success'>Record was deleted.</div>";
}
// select all data
$query = "SELECT usuari, tipo FROM usuario ORDER BY usuari DESC";
$stmt = $conn->prepare($query);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
// Ejecutamos
$stmt->execute();
		 
$num = $stmt->rowCount();
 
echo "<a href='crear.php' class='btn btn-primary m-b-1em'>Crear un nou usuari</a>";
 
if($num>0){
 
echo "<table class='table table-hover table-responsive table-bordered'>";
 
    echo "<tr>
        <th>Usuari</th>
        <th>Tipus</th>
        <th>Accions</th>
    </tr>";
 
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $esborrarD=$row['usuari'];
    extract($row);
    // creating new table row per record
    echo "<tr>
        <td>{$usuari}</td>
        <td>{$tipo}</td>
        <td>";
            // read one record
            echo "<a href='ver-un-user.php?usuari={$usuari}' class='btn btn-info m-r-1em'>Llegir</a>";
 
            // we will use this links on next part of this post
            echo "<a href='actualitzar-user.php?usuari={$usuari}' class='btn btn-primary m-r-1em'>Editar</a>";
 
            // we will use this links on next part of this post
            echo "<a href='#' onclick='borraruser(\"$esborrarD\");'  class='btn btn-danger'>Esborrar</a>";
        echo "</td>";
    echo "</tr>";
}
 
// end table
echo "</table>";
 
}
 
// if no records found
else{
    echo "<div class='alert alert-danger'>No s'ha trobat usuaris.</div>";
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