<!DOCTYPE html>
<?php
    // include database connection
    require 'conectar_DB.php';
    require 'middleware.php';    

 $message = '';
if(isset($_POST["crearhabitacio"])){
	function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
	}
    try{
		if (!empty($_POST['nom'])){

			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
				// insertar query
            $null = NULL;
            $precio=htmlspecialchars(strip_tags($_POST['precio']));
            $imagen=htmlspecialchars(strip_tags($_POST['imagen']));
            $m2=htmlspecialchars(strip_tags($_POST['m2']));
            $cantidad=htmlspecialchars(strip_tags($_POST['cantidad']));
            $persmax=htmlspecialchars(strip_tags($_POST['persmax']));
            $descripcion=htmlspecialchars(strip_tags($_POST['descripcion']));
            $nom=htmlspecialchars(strip_tags($_POST['nom']));
			$stmt = $conn->prepare("insert into tipo
            (precio, imagen, m2, cantidad, persmax, descripcion, nom) values 
			(:precio, :imagen, :m2, :cantidad, :persmax, :descripcion, :nom)");
            if(empty($precio)){
                $stmt->bindParam(':precio', $null);
            }else{
                $stmt->bindParam(':precio', $precio);
            }
            if(empty($imagen)){
                $stmt->bindParam(':imagen', $null);;
            }else{
                $stmt->bindParam(':imagen', $imagen);
            }
            if(empty($m2)){
                $stmt->bindParam(':m2', $null);            
            }else{
                $stmt->bindParam(':m2', $m2);
            }
            if(empty($cantidad)){
                $stmt->bindParam(':cantidad', $null);            
            }else{
                $stmt->bindParam(':cantidad', $cantidad);
            }
            if(empty($persmax)){
                $stmt->bindParam(':persmax', $null);
            }else{
                $stmt->bindParam(':persmax', $persmax);
            }
            if(empty($descripcion)){
                $stmt->bindParam(':descripcion', $null);
            }else{
                $stmt->bindParam(':descripcion', $descripcion);
            }
            if(empty($nom)){
                $stmt->bindParam(':nom', $null);
            }else{
                $stmt->bindParam(':nom', $nom);
            }
				
			if ($stmt->execute()) {
			  $message = 'La habitació ha sigut creada';
			} else {
			  $message = 'Ha hagut algun error';
                 print_r($stmt->errorInfo());
                echo "\nPDO::errorCode(): ", $stmt->errorCode();
                die();
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
            $password = password_hash($password, PASSWORD_DEFAULT);
			$stmt = $conn->prepare("insert into usuario 
            (usuari, password, nombre, apellidos, sexo, email, fechanacimiento) values 
			(:usuari, :password, :nombre, :apellidos, :sexo, :email, :fechanacimiento)");
				$stmt->bindParam(':usuari', $usuari);
				$stmt->bindParam(':password', $password);
				$stmt->bindParam(':nombre', $nombre);
				$stmt->bindParam(':apellidos', $apellidos);
				$fechanacimiento = date('Y-m-d', strtotime(str_replace('-', '/', $fechanacimiento))); 
				$stmt->bindParam(':fechanacimiento', $fechanacimiento);
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
		 
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">ADMIN</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
    <a class="nav-link" href="#" id="crearhabitacio">Crear tipus d'habitació</a>
  </li>
      <li class="nav-item">
        <a class="nav-link" href="#" id="crearusuari">Crear Usuari</a>
  </li>
      <li class="nav-item">
    <a class="nav-link" href="llistartipos.php">Llistar tipus</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="llistarusuaris.php">Llistar Usuaris</a>
  </li>
    </ul>
  </div>
</nav>
<?php if(!empty($message)): ?>
      <p> <?= $message ?> </p>
    <?php endif; ?>
<div class="col-sm-6" id="div-crearhabitacio">
<!-- PHP insert code will be here -->
<form action="crear.php" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Preu</td>
            <td><input type='number' name='precio' class='form-control' /></td>
        </tr>
        <tr>
            <td>Imatge</td>
            <td><input type='text' name='imagen' class='form-control' /></td>
        </tr>
        <tr>
            <td>Metres cuadrats</td>
            <td><input type='number' name='m2' class='form-control' /></td>
        </tr>
        <tr>
            <td>Cantitat d'habitacions</td>
            <td><input type='number' name='cantidad' class='form-control' /></td>
        </tr>
        <tr>
            <td>Persones maximes</td>
            <td><input type='number' name='persmax' class='form-control' /></td>
        </tr>
        <tr>
            <td>Descripció</td>
            <td><textarea name='descripcion' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td>Nom del tipus</td>
            <td><input type='text' name='nom' class='form-control' /></td>
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
			<tr>
				<td>Data neixament:</td>
				<td><input type='date' name='fechanacimiento' class='form-control' /></td>
			</tr>
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
</div> 		
    <script src="admincustom.js"></script>
	<script src="../utilitats/js/custom.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 

  </body>
</html>