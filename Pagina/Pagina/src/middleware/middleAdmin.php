<?php

/**
    * Middleware que controla si l'usuari està identificat.
    * Exemple per a M07.
    * @author: Dani Prados dprados@cendrassos.net
    *
    *
**/

/**
  * middleAdmin: Middleware que controla si l'usuari està identificat.
  *
  * @param $peticio contingut de la petició http.
  * @param $resposta contingut de la resposta http.
  * @param $next controlador que s'ha d'executar si l'usuari està identificat.
  *
**/
function middleAdmin($peticio, $resposta, $contenidor, $next)
{
    $nom = $peticio->get("SESSION", "nom");
    $cognom = $peticio->get("SESSION", "cognom");
    $missatge = $peticio->get("SESSION", "missatge");
    $resposta->set("missatge", $missatge);
   

    /* Validem que nom i cognom estan definits */
    if ($nom == "" || $cognom == "") {
        $resposta->setSession("error", "Has intentat accedir a la pàgina sense identificar-te!!!!!!\n");
        $resposta->redirect("Location:index.php?r=identificar");
    } else {
        $resposta = $next($peticio, $resposta, $contenidor);
    }


    return $resposta;
}
