  <?php
  session_start();

  unset($_SESSION['error']);
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

if (password_verify($password, $hash)) {
        $_SESSION["usuari"] = $usuari;
        $_SESSION["tipo"] =$tipo;
         header("location: index.php");
      }
      else{
        $_SESSION["error"] = "L'usuari o el password és incorrecte";
    header("Location:login.php");
}
  if(isset($_SESSION["usuari"])) {
    header("Location:index.php");
    }
}
?>