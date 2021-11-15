<?php

/**
    * Controlador de la portada.
    * Exemple per a M07.
    * @author: Dani Prados dprados@cendrassos.net
    *
    * Carrega la imatge que toca i la visualitza
    *
**/

/**
  * ctrlPortada: Controlador que carrega les tasques i visaulitza la portada
  *
  * @param $peticio contingut de la petició http.
  * @param $resposta contingut de la resposta http.
  *
**/
function ctrlAdmin($peticio, $resposta, $contenidor)
{

    $login = $peticio->get("SESSION", "login");
    $logat = $peticio->get("SESSION", "logat");

    $resposta->set("logat", $logat);
    $resposta->set("login", $login);

    $resposta->SetTemplate("admin.php");

    return $resposta;
}
