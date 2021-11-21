<?php
// include database connection
require 'conectar_DB.php';
require 'middleware.php';    


try {
 
    // get record ID
    // Amb isset() comprovem que existeix el ID
    $usuari=isset($_GET['usuari']) ? $_GET['usuari'] : die('Hi ha hagut un error: No hem trobat el ID');
 
    // delete query
    $query = "DELETE FROM usuario WHERE usuari = ?";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $usuari);
 
    if($stmt->execute()){
        // redirect to read records page and
        // tell the user record was deleted
        header('Location: llistarusuaris.php?action=deleted');
    }else{
        die('No s`ha eliminat');
    }
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>