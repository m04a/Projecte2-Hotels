 <?php
    session_start();
?>
                        <!-- ***** Barra de Navegació ***** -->
 <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div>
                    <nav class="main-nav">
                        <!-- ***** Logo Inici ***** -->
                        <a href="index.php" class="logo">HOTEL <em> MK</em></a>
                        <!-- ***** Logo Final ***** -->
                        <!-- ***** Menu Inici ***** -->
                        <ul class="nav">
                            <li><a href="index.php" class="active">Inici</a></li>
                            <li><a href="habitacions.php">Habitacions</a></li>
                            <li><a href="reservabuscador.php">Reserva</a></li>
							<li><a href="about.php">Sobre Nosaltes</a></li>
                            <li><a href="contacte.php">Contacte</a></li> 
							<?php
                            if(!$_SESSION["usuari"]) {
                            ?>
                            <li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Iniciar Sessió</a></li> 
							<li><a href="registre.php"> Registre</a></li> 
                            <?php 
                             }else{echo $_SESSION["usuari"];
                         }
                            ?>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
