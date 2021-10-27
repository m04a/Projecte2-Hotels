<!DOCTYPE HTML>
<html>
<head>
    <title>Llistar habitacions - PHP CRUD Tutorial</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
 
    <!-- container -->
    <div class="container">
 
        <div class="page-header">
            <h1>Habitacions</h1>
        </div>
 
        <?php
// fem un include de la nostre base de dades
   require '../includes/conectar_DB.php';
 
// delete message prompt will be here
 
// select all data
$query = "SELECT numhab, precio, tipo, Descripcion, ocupada FROM habitacion ORDER BY numhab DESC";
$stmt = $conn->prepare($query);	
$stmt->execute();
 
// this is how to get number of rows returned
$num = $stmt->rowCount();
 
// link to create record form
echo "<a href='crear.php' class='btn btn-primary m-b-1em'>Crear una nova habitacio</a>";
 
//check if more than 0 record found
if($num>0){
 
    //start table
echo "<table class='table table-hover table-responsive table-bordered'>";
 
 
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extract row
    // this will make $row['firstname'] to
    // just $firstname only
    extract($row);
 
    // creating new table row per record
    echo "<tr>
        <td>{$numhab}</td>
        <td>{$precio}</td>
        <td>{$tipo}</td>
        <th>{$Descripcion}</th>
        <td>{$ocupada}</td>
        <td>";
            // read one record
            echo "<a href='read_one.php?id={$numhab}' class='btn btn-info m-r-1em'>Llegir</a>";
 
            // we will use this links on next part of this post
            echo "<a href='update.php?id={$numhab}' class='btn btn-primary m-r-1em'>Editar</a>";
 
            // we will use this links on next part of this post
            echo "<a href='#' onclick='delete_user({$numhab});'  class='btn btn-danger'>Esborrar</a>";
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
 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<!-- confirm delete record will be here -->
 
</body>
</html>