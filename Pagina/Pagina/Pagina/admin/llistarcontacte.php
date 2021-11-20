<!DOCTYPE HTML>
<html>
<head>
    <title>Llistar contactes - Admin</title>
 
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
$query = "SELECT nom,email,assumpte,id,missatge FROM contacte ORDER BY id DESC";
$stmt = $conn->prepare($query); 
$stmt->execute();
 
echo "<a href='crear.php' class='btn btn-primary m-b-1em'>Tornar al panell d'admin</a>";


// this is how to get number of rows returned
$num = $stmt->rowCount();

// link to create record form
 
//check if more than 0 record found
if($num>0){
 
    //start table
echo "<table class='table table-dark table-hover table-responsive table-bordered'>";
 
    //creating our table heading
    echo "<tr>
        <th>ID</th>
        <th>Email</th>
        <th>Nom</th>
        <th>Assumpte</th>
        <th>Misstage</th>
    </tr>";
 
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extract row
    // this will make $row['firstname'] to
    // just $firstname only
    extract($row);
    // creating new table row per record
    echo "<tr>
        <td>{$id}</td>
        <td>{$email}</td>
        <td>{$nom}</td>
        <td>{$assumpte}€</td>
        <td>{$missatge}</td>";
 
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