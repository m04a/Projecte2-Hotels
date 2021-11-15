<?php

/**
    * Exemple de MVC.
    * Exemple per a M07 - Projecte 2.
    * @author: Dani Prados dprados@cendrassos.net
    * @version 0.1.0
    *
    * Exemple amb una mini galeria d'imatges.
    * Per provar com funcionar podeu executar php -S localhost:8000 a la carpeta public.
    * I amb el navegador visitar la url http://localhost:8000/
    *
    *
**/

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../src/config.php";


include "../src/controladors/portada.php";
include "../src/controladors/login.php";
include "../src/controladors/dologin.php";
include "../src/controladors/admin.php";

include "../src/middleware/middleAdmin.php";

$r = $_REQUEST["r"];

/* Creem els diferents models */
$contenidor = new Emeset\Contenidor($config);
$resposta = $contenidor->resposta();
$peticio = $contenidor->peticio();

if ($r === "admin") {
    $resposta = middleAdmin($peticio, $resposta, $contenidor, "ctrlAdmin");
} elseif ($r === "dologin") {
    $resposta = ctrldoLogin($peticio, $resposta, $contenidor);
} elseif ($r === "login") {
    $resposta = ctrlLogin($peticio, $resposta, $contenidor);
} elseif ($r == "") {
    $resposta = ctrlPortada($peticio, $resposta, $contenidor);
} else {
  //  $resposta = ctrlError($peticio, $resposta, $contenidor);
}


$resposta->resposta();
