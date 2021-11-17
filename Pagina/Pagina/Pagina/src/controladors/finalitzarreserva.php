<?php

function ctrlFinalitzarreserva($peticio, $resposta, $contenidor)
{
    $resposta->SetTemplate("finalitzarreserva.php");
    return $resposta;
}
