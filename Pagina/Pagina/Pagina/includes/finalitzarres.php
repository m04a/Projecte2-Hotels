 <?php
 if($_SESSION["tipo"]!="cliente"){
                header('Location: index.php?r=middleware');
                }
                else{
                if(!isset($_SESSION['nombre']) && empty($_SESSION['nombre'])) {               
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $fechanacimiento = $_POST['fechanacimiento'];
                $sexo = $_POST['sexo'];
                $email = $_POST['email'];
                $_SESSION["nombre"] = $nombre;
                $_SESSION["apellidos"] = $apellidos;
                $_SESSION["fechanacimiento"] = $fechanacimiento;
                $_SESSION["sexo"] = $sexo;
                $_SESSION["email"] = $email;                
            }
                $nombre = $_SESSION["nombre"];
                $apellidos = $_SESSION["apellidos"];
                $fechanacimiento = $_SESSION["fechanacimiento"];
                $sexo = $_SESSION["sexo"];
                $email = $_SESSION["email"];
                $to = $_SESSION["to"];                                     
                $from = $_SESSION["from"];                     
                $nhabitacio = $_SESSION["nhabitacio"];
                $npersones = $_SESSION["npersones"];
                $precio = $_SESSION["precio"];
                $preciototal = $nhabitacio * $precio;
                $nomhabitacio = $_SESSION["nom"];
                $usuari = $_SESSION["usuari"];
                $numhab = $_SESSION["numhab"];
                if(isset($_POST['nombre'])){
                $sql = "INSERT INTO reserva (numpers,idtipo,finicio,ffin,usuario,preciototal,canthab) VALUES (:npersones,:numhab,:desde,:hasta,:usuari,:preciototal,:nhabitacio)";
                //INSERT INTO reserva (numpers,idtipo,finicio,ffin,usuario) VALUES (1,1,'2021-08-10','2021-08-12','testt');
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':usuari', $usuari);
                $stmt->bindParam(':numhab', $numhab);
                $stmt->bindParam(':npersones', $npersones);
                $stmt->bindParam(':preciototal', $preciototal);
                $stmt->bindParam(':nhabitacio', $nhabitacio);
                /*Tienes que arreglar estos campos con la cosa de datetime, i faltan algunos campos*/
                $desde=DateTime::createFromFormat('j/m/Y', $from);
                $hasta=DateTime::createFromFormat('j/m/Y', $to);
                $stmt->bindParam(':desde', $desde->format('Y-m-d'));
                $stmt->bindParam(':hasta', $hasta->format('Y-m-d'));
}
$ultimareserva =$conn->query('SELECT MAX(numres) as ultimareserva FROM reserva')->fetchColumn();



  }
  ?>