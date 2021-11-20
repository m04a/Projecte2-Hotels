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
            <h1>Reserves</h1>
        </div>
 
        <?php
// fem un include de la nostre base de dades
   require 'conectar_DB.php';
   require 'middleware.php';    
// if it was redirected from delete.php

// select all data
$query = "SELECT numpers,idtipo,finicio,ffin,usuario,preciototal,canthab,numres FROM reserva ORDER BY numres DESC";
$stmt = $conn->prepare($query); 
$stmt->execute();
 
// this is how to get number of rows returned
$num = $stmt->rowCount();

// link to create record form
 
//check if more than 0 record found
if($num>0){
 
    //start table
echo "<table class='table table-dark table-hover table-responsive table-bordered'>";
 
    //creating our table heading
    echo "<tr>
        <th>Numero reserva</th>
        <th>Fecha inicis</th>
        <th>Fecha final</th>
        <th>Preu total</th>
        <th>Numero de perones</th>
        <th>Quantiat de habitacions</th>
         <th>Usuari</th>
    </tr>";
 
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extract row
    // this will make $row['firstname'] to
    // just $firstname only
    extract($row);
    // creating new table row per record
    echo "<tr>
        <td>{$numres}</td>
        <td>{$finicio}</td>
        <td>{$ffin}</td>
        <td>{$preciototal}€</td>
        <td>{$numpers}</td>
        <td>{$canthab}</td>
        <td>{$usuario}</td>";
 
            // we will use this links on next part of this post
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