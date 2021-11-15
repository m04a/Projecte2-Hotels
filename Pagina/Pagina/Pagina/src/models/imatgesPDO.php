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
class ImatgesPDO
{

    private $sql;

    /**
     * Constructor de la classe imatges amb PDO
     *
     * @param array $config
     */
    public function __construct($config)
    {
        $dsn = "mysql:dbname={$config['dbname']};host={$config['host']}";
        $usuari = $config['user'];
        $clau = $config['pass'];

        try {
            $this->sql = new \PDO($dsn, $usuari, $clau);
        } catch (\PDOException $e) {
            die('Ha fallat la connexió: ' . $e->getMessage() . " $usuari");
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
        $query = 'select id, titol, url_imatge as url from galeria where id=:id;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
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
        $query = "insert into galeria (titol,url_imatge) values (:titol, :url);";
        $stm = $this->sql->prepare($query);
        $stm->execute([":titol" => $titol, ":url" => $url]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
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
        $query = "update galeria set titol = :titol, url_imatge = :url where id=:id;";
        $stm = $this->sql->prepare($query);
        $stm->execute([":titol" => $titol, ":url" => $url, ":id" => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    /**
     * delete esborra la imatge amb l'id
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        $query = 'delete from galeria where id=:id;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    /**
     * llistat de les imatges
     *
     * @return array d'imatges amb ["titol", "url"]
     */
    public function llistat()
    {
        $query = "select id, titol, url_imatge as url from galeria;";
        $imatges = array();
        foreach ($this->sql->query($query, \PDO::FETCH_ASSOC) as $imatge) {
            $imatges[$imatge["id"]] = $imatge;
        }

        if ($this->sql->errorCode() !== '00000') {
            $err = $this->sql->errorInfo();
            $code = $this->sql->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
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
        $stm = $this->sql->prepare("select id, titol, url_imatge as url from galeria where titol like :q;");
        $stm->execute([':q' => "%$cerca%"]);
        $imatges = array();
        while ($imatge = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $imatges[$imatge["id"]] = $imatge;
        }
        //print_r($imatges);
        return $imatges;
    }
}
