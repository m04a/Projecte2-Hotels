<!--
    * Include de la creació de la reserva
    * 
    * @author: MohamedBourarach mbourarachs@cendrassos.net
    *
    * Carrega la part de la capçalera.
    *
-->
<?php
      if($_SESSION["tipo"]!="cliente"){
                header('Location: index.php?=middleware');
                }
                else{
                    $missatge='';
                    if(!isset($_SESSION['to']) && empty($_SESSION['to'])) {
                    $to = $_POST["fins"];
                    $from = $_POST["desde"];
                    $nhabitacio = $_POST["nhabitacio"];
                    $npersones = $_POST["npersones"];
                    $numhab = $_POST["numhab"];
       

                    $_SESSION["to"]=$to;
                    $_SESSION["from"]=$from;                     
                    $_SESSION["nhabitacio"]=$nhabitacio;
                    $_SESSION["npersones"]=$npersones;
                    $_SESSION["numhab"]=$numhab;

                    }
                    $usuari= $_SESSION["usuari"];
                    $query = "SELECT nombre, apellidos, fechanacimiento, sexo, email FROM usuario WHERE usuari = '$usuari' LIMIT 0,1";

                     $stmt = $conn->prepare($query);
 
                    // this is the first question mark
                     $stmt->bindParam('$usuari',$_POST['usuari']);
 
                         // execute our query
                     $stmt->execute();
 
                     // store retrieved row to a variable
                     $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
                    // values to fill up our form

                    $nombre = $row['nombre'];
                    $apellidos = $row['apellidos'];
                    $fechanacimiento = $row['fechanacimiento'];
                    $sexo = $row['sexo'];
                    $email = $row['email'];
if(isset($_POST['treasure'])){

    try{
 
        // write update query
        // in this case, it seemed like we have so many fields to pass and
        // it is better to label them and not use question marks
        $query = "UPDATE usuario
                    SET nombre=:nombre,apellidos=:apellidos,
                    fechanacimiento=:fechanacimiento,sexo=:sexo,email=:email
                    WHERE usuari = '$usuari'";
                    
                    
                
        // prepare query for excecution
        $stmt = $conn->prepare($query);
 
        // posted values
        $nombre=htmlspecialchars(strip_tags($_POST['nombre']));
        $apellidos=htmlspecialchars(strip_tags($_POST['apellidos']));
        $fechanacimiento = date('Y-m-d', strtotime(str_replace('-', '/', $_POST['fechanacimiento'])));
        $sexo=htmlspecialchars(strip_tags($_POST['sexo']));
        $email=htmlspecialchars(strip_tags($_POST['email']));
 
        // bind the parameters
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':fechanacimiento', $fechanacimiento);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':email', $email);
 
        // Execute the query
        if($stmt->execute()){
            $missatge="Les dades s'han actualitzat";
        }else{
            $missatge="Les dades no s'han actualitzat";

        }
 
    }
 
    // show errors
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}

                }
				?>