<?php
require 'conectar_DB.php';

if(isset($_POST["reservaBuscar"])){
unset($_SESSION["to"]);
unset($_SESSION["from"]);
unset($_SESSION["nhabitacio"]);
unset($_SESSION["npersones"]);
unset($_SESSION["precio"]);
unset($_SESSION["nombre"]);
unset($_SESSION["apellidos"]);
unset($_SESSION["fechanacimiento"]);
unset($_SESSION["sexo"]);
unset($_SESSION["email"]);
unset($_SESSION["numhab"]);


$to = $_POST["to"];
$from = $_POST["from"];
$nhabitacio = $_POST["nhabitacio"];
$npersones = $_POST["npersones"];
    if(!empty($to) && !empty($from) && !empty($nhabitacio) && !empty($npersones)){
   //Hem de posar les condicions corresponentes
    /*HABITACIÓ NO TOPA AMB EL PERIODE DE VACANCES DEL HOTEL
HI HAN SUFICIENTS HABITACIONS DE CADA TIPUS
LA HABITACIÓ NO ESTÁ RESERVADA EN ELS PERIODES DEMANATS **/
    $query = "SELECT idtipo,precio,descripcion,nom,imagen FROM tipo ORDER BY idtipo DESC";
    $stmt = $conn->prepare($query); 
    $stmt->execute();
    echo '<div class="row">';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row); 
        $idtipo = $row['idtipo'];
        $ffin = DateTime::createFromFormat('j/m/Y', $to);
        $finicio = DateTime::createFromFormat('j/m/Y', $from);
        $query2 = "SELECT COUNT(idtipo) FROM reserva WHERE finicio >= :finicio AND ffin <= :ffin and idtipo = :idtipo";
        $result = $conn->prepare($query2); 
        $result->bindParam(':finicio', $finicio->format('Y-m-d'));
        $result->bindParam(':ffin', $ffin->format('Y-m-d'));
        $result->bindParam(':idtipo', $idtipo);
        $result->execute(); 
        $number_of_rows = $result->fetchAll();
        $stmt2 = $conn->prepare("SELECT cantidad from tipo where idtipo=:idtipo");
        $stmt2->bindParam(':idtipo', $idtipo);
        $stmt2->execute();
        $cantidad=$stmt2->fetchColumn();
        $stmt3 = $conn->prepare("SELECT count(idtipo) from tipo where (vacfin <= :vacinicio or vacinicio >= :vacfin) and idtipo = :idtipo");
        $stmt3->bindParam(':vacinicio', $finicio->format('Y-m-d'));
        $stmt3->bindParam(':vacfin', $ffin->format('Y-m-d'));
        $stmt3->bindParam(':idtipo', $idtipo);
        $stmt3->execute();
        $vacas = $stmt3->fetchAll();
        $disponible=$cantidad-$number_of_rows[0]["COUNT(idtipo)"];
        if($number_of_rows[0]["COUNT(idtipo)"]+$nhabitacio<=$cantidad&&$vacas[0]["count(idtipo)"]>0){
        ?>