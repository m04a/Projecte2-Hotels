<!DOCTYPE html>
<?php
    // include database connection
    require '../includes/conectar_DB.php';
 $message = '';
if(isset($_POST["crearhabitacio"])){
	function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
	}
    try{
		if (!empty($_POST['tipo'])){

			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
				// insertar query
			$stmt = $conn->prepare("insert into habitacion (tipo, Descripcion, precio) values 
			(:tipo, :Descripcion, :precio)");
				$stmt->bindParam(':tipo', $tipo);
				$stmt->bindParam(':Descripcion', $Descripcion);
				$stmt->bindParam(':precio', $precio);

				$tipo=htmlspecialchars(strip_tags($_POST['tipo']));
				$Descripcion=htmlspecialchars(strip_tags($_POST['Descripcion']));
				$precio=htmlspecialchars(strip_tags($_POST['precio']));


			if ($stmt->execute()) {
			  $message = 'La habitació ha sigut creada';
			} else {
			  $message = 'Ha hagut algun error';
			}
		}
		
    }catch(PDOException $exception){
        die ('ERROR: ' . $exception->getMessage());
    }
}
if(isset($_POST["crearusuari"])){
  try{
		if (!empty($_POST['usuari']) && !empty($_POST['password'])){

			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
				// insertar query
			$stmt = $conn->prepare("insert into usuario (usuari, password, nombre, apellidos, sexo, email, fechanacimiento) values 
			(:usuari, :password, :nombre, :apellidos, :sexo, :email, :fechanacimiento)");
				$stmt->bindParam(':usuari', $usuari);
				$stmt->bindParam(':password', $password);
				$stmt->bindParam(':nombre', $nombre);
				$stmt->bindParam(':apellidos', $apellidos);
				$fechanacimiento = date('Y-m-d', strtotime(str_replace('-', '/', $fechanacimiento))); 
				$stmt->bindParam(':fechanacimiento', $fecha);
				$stmt->bindParam(':sexo', $sexo);
				$stmt->bindParam(':email', $email);
			
				$usuari=htmlspecialchars(strip_tags($_POST['usuari']));
				$password=htmlspecialchars(strip_tags($_POST['password']));
				$nombre=htmlspecialchars(strip_tags($_POST['nombre']));
				$apellidos=htmlspecialchars(strip_tags($_POST['apellidos']));
				$fechanacimiento=htmlspecialchars(strip_tags($_POST['fechanacimiento']));
				$sexo=htmlspecialchars(strip_tags($_POST['sexo']));
				$email=htmlspecialchars($_POST['email']);


			if ($stmt->execute()) {
			  $message = 'El usuari ha sigut creat';
			} else {
			  $message = 'Ha hagut algun error';
			}
		}else{
			$message = 'usuari o password no establecidos';
		}
		
    }catch(PDOException $exception){
        die ('ERROR: ' . $exception->getMessage());
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

    <link rel="stylesheet" type="text/css" href="../utilitats/css/font-awesome.css">

    <link rel="stylesheet" href="adminstyle.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    </head>
    
    <body> 
		 
   <ul class="nav nav-pills nav-fill">
  <li class="nav-item">
    <a class="nav-link" href="#" id="crearhabitacio">Crear Habitació</a>
  </li>
    <a class="nav-link" href="#" id="crearusuari">Crear Usuari</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="llistarhabitacions.php">Llistar Habitacions</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="llistarusuaris.php">Llistar Usuaris</a>
  </li>
</ul>
<?php if(!empty($message)): ?>
      <p> <?= $message ?> </p>
    <?php endif; ?>
<div class="col-sm-6" id="div-crearhabitacio">
<!-- PHP insert code will be here -->
<form action="crear.php" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Tipus d'habitació</td>
            <td>
				<select name="tipo" id="tipo" class='form-control'>
					<option value="Estandar">Estandar</option>
					<option value="Duplex">Duplex</option>
					<option value="Premium">Premium</option>
					<option value="Duplex premium">Duplex premium</option>
			  </select>
			</td>
        </tr>
        <tr>
            <td>Descripció</td>
            <td><textarea name='Descripcion' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td>Preu</td>
            <td><input type='number' name='precio' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' name="crearhabitacio" class='btn btn-primary' />
            </td>
        </tr>
    </table>
</form>
  </div>
<div class="col-sm-6" id="div-crearusuari">
<!-- PHP insert code will be here -->
<form action="crear.php" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Usuari:</td>
			<td><input type='text' name='usuari' class='form-control' /></td>
        </tr>
        <tr>
            <td>Contrasenya:</td>
            <td><input type="password" name='password' class='form-control' /></td>
        </tr>
        <tr>
            <td>Nom:</td>
            <td><input type='text' name='nombre' class='form-control' /></td>
        </tr>
		<tr>
            <td>Cognom:</td>
            <td><input type='text' name='apellidos' class='form-control' /></td>
        </tr>
		<!--<tr>
            <td>Data neixament:</td>
            <td><input type='date' name='fechanacimiento' class='form-control' /></td>
        </tr>-->
		<tr>
            <td>Sexe:</td>
            <td>
				<select name="sexo" id="sexo" class='form-control'>
					<option value="0">Home</option>
					<option value="1">Dona</option>
			  </select>
			</td>
        </tr>
		<tr>
            <td>Email:</td>
            <td><input type='text' name='email' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' name="crearusuari" class='btn btn-primary' />
            </td>
        </tr>
    </table>
</form>
  </div> <!--
		<div class="col-sm-6" id="div-crearusuari">
<form action="crear.php" method="post">
  <div class="row mb-3">
    <label for="usuari" class="col-sm-2 col-form-label">Usuari: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="usuari">
    </div>
  </div>
  <div class="row mb-3">
    <label for="password" class="col-sm-2 col-form-label">Contrasenya: </label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password">
    </div>
  </div>
	  <div class="row mb-3">
    <label for="nombre" class="col-sm-2 col-form-label">Nom: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nombre">
    </div>
  </div>
	  <div class="row mb-3">
    <label for="apellidos" class="col-sm-2 col-form-label">Cognom: </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="apellidos">
    </div>
  </div>
	  <div class="row mb-3">
    <label for="fechanacimiento" class="col-sm-2 col-form-label">Data neixament: </label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="fechanacimiento">
    </div>
  </div> 
	  <div class="row mb-3">
    <label for="sexo" class="col-sm-2 col-form-label">Sexe:</label>
		  <select name="sexo" id="sexo" class="col-sm-2 col-form-label">
			<option value="0">Home</option>
			<option value="1">Dona</option>
		  </select>
  </div>
	  <div class="row mb-3">
    <label for="email" class="col-sm-2 col-form-label">Email: </label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email">
    </div>
  </div>
  
  <button type="submit" name="crearusuari" class="btn btn-primary">Crear nou usuari</button>
</form>
</div> -->
		
    <script src="admincustom.js"></script>
	<!-- <script src="../utilitats/js/custom.js"></script> -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 

  </body>
</html>