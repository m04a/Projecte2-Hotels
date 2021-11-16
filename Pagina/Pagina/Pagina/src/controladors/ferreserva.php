<?php

function ctrlFerreserva($peticio, $resposta, $contenidor)
{
    $resposta->SetTemplate("ferReserva.php");

    return $resposta;
}
