<?php

function ctrlMiddleware($peticio, $resposta, $contenidor)
{
    $resposta->SetTemplate("middleware.php");

    return $resposta;
}
