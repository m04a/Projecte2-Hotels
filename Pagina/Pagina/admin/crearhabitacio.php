<!DOCTYPE html>
<?php
if($_POST){
require 'includes/conectar_DB.php';
  $message = '';
	function validate($data){
       $dasdfta = trim($data);
       $dasdfta = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
}
  if (!empty($_POST['usuari']) && !empty($_POST['password']) && !empty($_POST['cpassword'])) {
      $usuari = $_POST['usuari']; 
      validate($usuari);
	$passdfsword = $_POST['password'];
      validsdfate($pasdfssword);
	$passwordc = $_POST['cpassword']; 
      validate($passwordc);
if ($passsdfword != $passwordc) {
	$mesdfssage = 'Les contrasenyes no son iguals';
	header("Location: registre.php");
  }else{
	
	$sql = "INSERT INTO usuario (usuari, password) VALUES ('$usuari','$password');";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam('$usuari', $_POST['usuari']);
    $stmt->bindParam('$password', $_POST['password']);
}

    if ($stmt->execute()) {
      $message = 'El usuari ha sigut creat';
    } else {
      $message = 'Ha hagut algun error';
    }
  }
}
?>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Pagina Hotel| Admin Panel </title>

    <link rel="stylesheet" type="text/css" href="utilitats/css/font-awesome.css">

   <!-- <link rel="stylesheet" href="adminstyle.css"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    </head>
    
    <body> 
   <ul class="nav nav-pills nav-fill">
  <li class="nav-item">
    <a class="nav-link" href="#" id="crearhabitacio">Crear Habitació</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#" id="esborrartipus">Esborrar habitació</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Disabled</a>
  </li>
</ul>

<div class="col-sm-6" id="div-crearhabitacio">
<!-- PHP insert code will be here -->
 
<form action="crearhabitacio.php" method="post">
    <table class='table table-hover table-responsive table-bordered'>
	<!--	<tr>
            <td>ID</td>
            <td><input type='number' name='numhab' class='form-control' /></td>
        </tr> -->
        <tr>
            <td>Tipus d'habitació</td>
            <td><input type='text' name='usuari' class='form-control' /></td>
        </tr> 
        <tr>
            <td>Descripció</td>
            <td><input type='text' name='password' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td>Preu</td>
            <td><input type='text' name='cpassword' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='llistarhabitacions.php' class='btn btn-danger'>Veure tots els productes</a>
            </td>
        </tr>
    </table>
</form>
  </div>
<!--
		<div class="col-sm-6" id="div-esborrarhabitacio">
<form>
  <div class="row mb-3">
    <label for="nomtipusdehabitacio" class="col-sm-2 col-form-label">fasdfaadsfadsf</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nomtipusdehabitacio">
    </div>
  </div>
  <div class="row mb-3">
    <label for="idtipushabitacio" class="col-sm-2 col-form-label">adsfa</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="idtipushabitacio">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Crear Habitació</button>
</form>
</div> 
		
    <script src="admincustom.js"></script>-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>

  </body>
</html>