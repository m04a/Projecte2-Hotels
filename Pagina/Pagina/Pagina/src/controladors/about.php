<?php

function ctrlAbout($peticio, $resposta, $contenidor)
{
    $resposta->SetTemplate("about.php");

    return $resposta;
}
