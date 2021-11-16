<?php
// include database connection
require 'conectar_DB.php';
require 'middleware.php';    


try {
 
    // get record ID
    // isset() is a PHP function used to verify if a value is there or not
    $usuari=isset($_GET['usuari']) ? $_GET['usuari'] : die('ERROR: Record ID not found.');
 
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