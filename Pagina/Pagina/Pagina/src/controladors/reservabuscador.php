<?php

function ctrlReserva($peticio, $resposta, $contenidor)
{
    $resposta->SetTemplate("reservabuscador.php");
    return $resposta;
}
