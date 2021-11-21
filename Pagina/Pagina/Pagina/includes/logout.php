<!--
    * Include logout
    * 
    * @author: MohamedBourarach mbourarachs@cendrassos.net
    *
    * Ens trenca la sesió i ens dirgeix al la pagina principal
    *
-->
<?php
    session_start();
    unset($_SESSION["usuari"]);
    unset($_SESSION["tipo"]);
    header("Location:../public/index.php?r=index");
?>