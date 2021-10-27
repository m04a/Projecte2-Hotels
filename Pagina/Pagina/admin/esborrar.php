<?php
// include database connection
require '../includes/conectar_DB.php';
 
try {
 
    // get record ID
    // isset() is a PHP function used to verify if a value is there or not
    $numhab=isset($_GET['numhab']) ? $_GET['numhab'] : die('ERROR: Record ID not found.');
 
    // delete query
    $query = "DELETE FROM habitacion WHERE numhab = ?";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $numhab);
 
    if($stmt->execute()){
        // redirect to read records page and
        // tell the user record was deleted
        header('Location: llistarhabitacions.php?action=deleted');
    }else{
        die('No s`ha eliminat');
    }
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>