<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Pagina Hotel| Admin Panel </title>

    <link rel="stylesheet" type="text/css" href="utilitats/css/font-awesome.css">

    <link rel="stylesheet" href="adminstyle.css">

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
<form id='borrartipus' action='creartipushabitacio.php' method='post'>
  <div class="row mb-3">
    <label for="nomtipusdehabitacio" class="col-sm-2 col-form-label">Nom del tipus d'habitació </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nomtipusdehabitacio">
    </div>
  </div>
  <div class="row mb-3">
    <label for="idtipushabitacio" class="col-sm-2 col-form-label">Id tipus habitacio</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="idtipushabitacio">
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Crear Habitació</button>
</form>
</div>
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
    <script src="admincustom.js"></script>
  </body>
</html>