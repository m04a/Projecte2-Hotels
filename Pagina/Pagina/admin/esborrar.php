<?php
// include database connection
require '../includes/conectar_DB.php';
require 'middleware.php';    
 

try {
 
    // get record ID
    // isset() is a PHP function used to verify if a value is there or not
    $idtipo=isset($_GET['idtipo']) ? $_GET['idtipo'] : die('ERROR: Record ID not found.');
 
    // delete query
    $query = "DELETE FROM tipo WHERE idtipo = ?";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $idtipo);
 
    if($stmt->execute()){
        // redirect to read records page and
        // tell the user record was deleted
        header('Location: llistartipos.php?action=deleted');
    }else{
        die('No s`ha eliminat');
    }
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>