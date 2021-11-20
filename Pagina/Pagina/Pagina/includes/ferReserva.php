<?php
if(!empty($_POST['idtipo'])){
          $numhab = $_POST["idtipo"];
          $_SESSION['numhab'] = $numhab; 
        }
        else
          { $numhab = $_SESSION['numhab']; }


// read current record's data
try {
    // prepare select query
    $query = "SELECT nom,descripcion,precio,m2 FROM tipo WHERE '$numhab' = idtipo LIMIT 0,1";

    $stmt = $conn->prepare($query);
 
    // this is the first question mark
    $stmt->bindParam($numhab);
 
    // execute our query
    $stmt->execute();
 
    // store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // values to fill up our form

    $_SESSION["nom"] = $row['nom'];
    $_SESSION["descripcion"] = $row['descripcion'];
    $_SESSION["precio"] = $row['precio'];
    $_SESSION["m2"] = $row['m2'];
    if(!isset($_SESSION['to']) && empty($_SESSION['to'])) {
    $to = $_POST["fins"];
    $from = $_POST["desde"];
    $nhabitacio = $_POST["nhabitacio"];
    $npersones = $_POST["npersones"];
    $_SESSION["to"]=$to;
    $_SESSION["from"]=$from;                     
    $_SESSION["nhabitacio"]=$nhabitacio;
    $_SESSION["npersones"]=$npersones;
  }
  else{
    $to=$_SESSION["to"];
    $from=$_SESSION["from"];                     
    $nhabitacio=$_SESSION["nhabitacio"];
    $npersones=$_SESSION["npersones"];
}
    $nom= $_SESSION["nom"];
    $descripcion= $_SESSION["descripcion"];
    $precio= $_SESSION["precio"];
    $m2=$_SESSION["m2"];
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>