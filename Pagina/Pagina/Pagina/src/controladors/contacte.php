<?php
require '../includes/conectar_DB.php';

function ctrlContacte($peticio, $resposta, $contenidor)
{
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nom=htmlspecialchars($_POST["nom"]);
    $email=htmlspecialchars($_POST["email"]);
    $assumpte=htmlspecialchars($_POST["assumpte"]);
    $missatge=htmlspecialchars($_POST["missatge"]);

$sql = "INSERT INTO contacte (nom,email,missatge,assumpte) VALUES ('$nom','$email','$missatge','$assumpte');";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam('$nom', $_POST['nom']);
                $stmt->bindParam('$email', $_POST['email']);
                $stmt->bindParam('$missatge', $_POST['missatge']);
                $stmt->bindParam('$assumpte', $_POST['assumpte']);

 if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was updated.</div>";
			header("Location:index.php?r=contacte");
        }else{
            echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
			header("Location:index.php?r=contacte");
        }
}
    $resposta->SetTemplate("contacte.php");

    return $resposta;
}
