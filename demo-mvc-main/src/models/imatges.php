<?php

/**
 * Exemple per a M07.
 * @author: Dani Prados dprados@cendrassos.net
 * @deprecated 0.1
 *
 * Model les imatges.
 *
**/

namespace Daw;

/**
 * Imatges
*/
class Imatges
{

    public $imatges = [
        ["titol" => "Via lactea", "url" => "via-lactea.jpg"],
        ["titol" => "Figueres", "url" => "figueres.jpg"],
        ["titol" => "Calella", "url" => "calella.jpg"],
        ["titol" => "Nova York", "url" => "ny.jpg"],
        ["titol" => "Fraser Island", "url" => "platja.jpg"],
        ["titol" => "Lake Moraine", "url" => "llac.jpg"]
    ];

    /**
     * get et retorna la imatge amb l'id
     *
     * @param int $id
     * @return array imatge amb ["titol", "url"]
     */
    public function get($id)
    {
        return $this->imatges[$id];
    }

    /**
     * llistat de les imatges
     *
     * @return array d'imatges amb ["titol", "url"]
     */
    public function llistat()
    {
        return $this->imatges;
    }
}
