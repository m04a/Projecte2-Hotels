<!DOCTYPE html>
<?php 
require '../includes/conectar_DB.php';

$message ="";

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
				$message ="El teu missatge s'ha enviat";
        }else{
				$message ="El teu missatge no s'ha enviat";
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

    <title>Pagina Hotel| Contacte </title>

    <link rel="stylesheet" type="text/css" href="../utilitats/css/font-awesome.css">

    <link rel="stylesheet" href="../utilitats/css/style.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    
    <body> 
    
    <!-- ***** Carregador Inici ***** -->
    <?php
         include '../includes/carregador.php';
    ?>
    <!-- *** Preloader End *** -->
    
    
    <!-- *** Header Principal *** -->
    <?php
         include '../includes/nav.php';
    ?>
    <!-- *** Header Final *** -->
    
   <!-- *** Capçalera inici *** -->
    <?php
         include '../includes/capsalera.php';
    ?>
    <!-- *** Capçalera Final *** -->

<!-- ***** Contact Us Area Starts ***** -->
    <section class="section" id="contact-us" style="margin-top: 0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                                        <div class="contact-form">

                    <div id="map">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47242.71247854812!2d2.9302244202294494!3d42.264229323373556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12ba8de7daf77b2d%3A0x2f451468ac1a35cb!2s17600%20Figueres%2C%20Girona!5e0!3m2!1sca!2ses!4v1636988055247!5m2!1sca!2ses" width="100%" height="600px" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
                </div>
                     <div class="col-lg-6 col-md-6 col-xs-12">
                <form method="POST">
                    <div class="contact-form">
                        <form id="contact" action="" method="post">
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                <label for="nomcomplet">Nom complet</label>
                                    <input type="name" name="nom" class="form-control" id="inputname" aria-describedby="inputname" placeholder="Entra el teu nom">
                                    </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                        <label for="emailAdressa">Email address</label>
                                <input name="email" name="email" class="form-control" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Entra el teu email*" required="">
                            </div>
                            </div>
                             <div class="col-md-6 col-sm-12">
                              <div class="form-group">
                                <label for="asumbte">Asumpte</label>
                                    <input type="name" name="assumpte" class="form-control" id="asumpte" aria-describedby="asumte" placeholder="Entra el tema de la consulta">
                                    </div>
                            </div>
                            <div class="col-lg-12">
                             <label for="exampleFormControlTextarea1"> Conringut del missatge</label>
                                <textarea class="form-control" name="missatge" rows="6" id="missatge" placeholder="Message" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" id="form-submit" class="main-button">Enviar missatge</button>
                            </div>
                        </form>   
		<?php if(!empty($message)){echo "<div class='alert alert-info'>$message</div>";} ?>
						
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area Ends ***** -->

     <!-- *** Footer inici *** -->
     <?php
     include '../includes/footer.php';
    ?>
    <!-- *** Footer final *** -->

    <!-- jQuery -->
    <script src="../utilitats/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="../utilitats/js/popper.js"></script>
    <script src="../utilitats/js/bootstrap.min.js"></script>

    <!-- Plugins afegits -->
    <script src="../utilitats/js/scrollreveal.min.js"></script>
    <script src="../utilitats/js/waypoints.min.js"></script>
    <script src="../utilitats/js/jquery.counterup.min.js"></script>
    <script src="../utilitats/js/imgfix.min.js"></script> 
    <script src="../utilitats/js/mixitup.js"></script> 
    <script src="../utilitats/js/accordions.js"></script>
    
    <!-- Fitxer nostre -->
    <script src="../utilitats/js/custom.js"></script>

  </body>
</html>

  </body>
</html>