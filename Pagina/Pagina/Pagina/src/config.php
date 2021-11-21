<?php

$config = array();

/* configuració de connexió a la base dades */
$config["db"] = array();
$config["db"]["user"] = 'admin';
$config["db"]["pass"] = 'Nemes1sx';
$config["db"]["dbname"] = 'hotel';
$config["db"]["host"] = 'localhost';

/* Path on guardarem el fitxer sqlite */
$config["sqlite"]["path"] = '../';
$config["sqlite"]["name"] = 'galeria.sqlite';

require_once "../src/emeset/peticio.php";
require_once "../src/emeset/resposta.php";
require_once "../src/emeset/contenidor.php";


