<!--
    * Include checkuser
    * 
    * @author: MohamedBourarach mbourarachs@cendrassos.net
    *
    * Si el tipus esta asignat en el login o el registre ens torna a la pagina principal
    *
-->
<?php
session_start();
      if(isset($_SESSION["tipo"])){
           header('Location: index.php?r=index');       
      }
?>