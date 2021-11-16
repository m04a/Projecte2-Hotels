<?php

function ctrlConfirmarReserva($peticio, $resposta, $contenidor)
{
    $resposta->SetTemplate("confirmarreserva.php");

    return $resposta;
}
