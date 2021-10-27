<?php

/**
 * Exemple per a M07.
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Model les imatges.
 *
**/

namespace Daw;

/**
 * Imatges
*/
class ImatgesSQLite
{

    private $sql;

    /**
     * Constructor de la classe imatges amb SQLite
     *
     * @param array $config
     */
    public function __construct($config)
    {
        $db = $config["path"] . $config["name"];
        $this->sql = new \SQLite3($db);
        if (! file_exists($db)) {
            die("No s'ha pogut obrir la base de dades");
        }
    }

    /**
     * get et retorna la imatge amb l'id
     *
     * @param int $id
     * @return array imatge amb ["titol", "url"]
     */
    public function get($id)
    {
        $query = $this->sql->prepare('select id, titol, url_imatge as url from galeria where id=:id;');
        $query->bindValue(':id', $id, SQLITE3_INTEGER);
        $result = $query->execute();
        $imatge = $result->fetchArray(SQLITE3_ASSOC);
        //print_r($imatge);
        return $imatge;
    }

    /**
     * afegeix una imatge a la base de dades
     *
     * @param string $titol
     * @param string $url
     * @return void
     */
    public function add($titol, $url)
    {
        $q = $this->sql->prepare("insert into galeria (titol,url_imatge) values (:titol, :url);");
        $q->bindValue(':titol', $titol, SQLITE3_TEXT);
        $q->bindValue(':url', $url, SQLITE3_TEXT);
        $q->execute();
    }

     /**
     * actualitza una imatge a la base de dades
     *
     * @param int id
     * @param string $titol
     * @param string $url
     * @return void
     */
    public function update($id, $titol, $url)
    {
        $q = $this->sql->prepare("update galeria set titol = :titol, url_imatge = :url where id=:id;");
        $q->bindValue(':titol', $titol, SQLITE3_TEXT);
        $q->bindValue(':url', $url, SQLITE3_TEXT);
        $q->bindValue(':id', $id, SQLITE3_INTEGER);
        $q->execute();
    }

    /**
     * delete esborra la imatge amb l'id
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        $query = $this->sql->prepare('delete from galeria where id=:id;');
        $query->bindValue(':id', $id, SQLITE3_INTEGER);
        $result = $query->execute();
    }

    /**
     * llistat de les imatges
     *
     * @return array d'imatges amb ["titol", "url"]
     */
    public function llistat()
    {
        $result = $this->sql->query("select id, titol, url_imatge as url from galeria;");
        $imatges = array();
        while ($imatge = $result->fetchArray(SQLITE3_ASSOC)) {
            $imatges[$imatge["id"]] = $imatge;
        }
        //print_r($imatges);
        return $imatges;
    }

    /**
     * cerca les imatges que tenen el text $cerca al titol
     *
     * @return array d'imatges amb ["titol", "url"]
     */
    public function llistatCercar($cerca)
    {
        $q = $this->sql->prepare("select id, titol, url_imatge as url from galeria where titol like :q;");
        $q->bindValue(':q', "%$cerca%", SQLITE3_TEXT);
        $result = $q->execute();
        $imatges = array();
        while ($imatge = $result->fetchArray(SQLITE3_ASSOC)) {
            $imatges[$imatge["id"]] = $imatge;
        }
        //print_r($imatges);
        return $imatges;
    }
}
