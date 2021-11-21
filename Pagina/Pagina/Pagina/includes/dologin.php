<!--
    * Include dologin
    * 
    * @author: MohamedBourarach mbourarachs@cendrassos.net
    *
    * Valdiador de login revisa en la base de dades si la contrasenya es correcte
    *
-->
  <?php
  session_start();
  $message = '';
  function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
}
  if (isset($_POST["login"])) {
      $usuari = $_POST['usuari']; 
      validate($usuari);
      $password = $_POST['password'];
      validate($password);
      

    $hash =$conn->query("SELECT password FROM usuario WHERE usuari ='$usuari'")->fetchColumn();
    validate($hash);
    $tipo =$conn->query("SELECT tipo FROM usuario WHERE usuari ='$usuari'")->fetchColumn();

/*Verifica si la contrasenya es corecte amb el la funció de verify*/
if (password_verify($password, $hash)) {
        $_SESSION["usuari"] = $usuari;
        $_SESSION["tipo"] =$tipo;
         header("location: index.php");
      }
      else{
        $message = 'Error';
}
  if(isset($_SESSION["usuari"])) {
    header("Location:index.php");
    }
}
?>