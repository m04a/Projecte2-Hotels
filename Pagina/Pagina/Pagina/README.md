

# GUIA INSTALACIÓ
<br />
<div align="center">
  <a href="https://github.com/othneildrew/Best-README-Template">
    <img src="https://i.ibb.co/JHfjBC6/Screenshot-20211008-011505-2.png" alt="Logo" width="200" height="250">
  </a>

  <h3 align="center">EL JOC DE LA VIDA</h3>


PRIMER IMPORTEM LA BASE DE DADES
=============
Usuari de prova admin - > adminmoha | password -> 123


```sql
-- MariaDB dump 10.19  Distrib 10.5.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: hotel
-- ------------------------------------------------------
-- Server version	10.5.12-MariaDB-0+deb11u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contacte`
--

DROP TABLE IF EXISTS `contacte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacte` (
  `nom` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `missatge` varchar(1000) NOT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `assumpte` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacte`
--

LOCK TABLES `contacte` WRITE;
/*!40000 ALTER TABLE `contacte` DISABLE KEYS */;
INSERT INTO `contacte` VALUES ('0','','',1,''),('hola','molamedb@gmail.com','asdfadsf',2,'sadasdf'),('moha','sdfadf@gmail.com','adfadsf\r\n',3,'asdfadsf'),('moha','asdfadsf@gmail.com','asdfadsfa',4,'molasdf'),('moha','asdfadsf@gmail.com','asdfadsfa',5,'molasdf'),('adfasd','adsfasdfazi@gmail.com','asdfasdffds',6,'sdfadsf'),('','dasdfa&lt;@gmal.com','asdfadfa',7,'');
/*!40000 ALTER TABLE `contacte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva` (
  `numres` int(10) NOT NULL AUTO_INCREMENT,
  `numpers` int(5) DEFAULT NULL,
  `finicio` date DEFAULT NULL,
  `ffin` date DEFAULT NULL,
  `idtipo` int(15) DEFAULT NULL,
  `usuario` varchar(69) DEFAULT NULL,
  `preciototal` int(6) DEFAULT NULL,
  `canthab` int(3) DEFAULT NULL,
  PRIMARY KEY (`numres`),
  KEY `reservatipo` (`idtipo`),
  KEY `reservausuari` (`usuario`),
  CONSTRAINT `reservatipo` FOREIGN KEY (`idtipo`) REFERENCES `tipo` (`idtipo`),
  CONSTRAINT `reservausuari` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`usuari`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` VALUES (1,1,NULL,NULL,NULL,NULL,NULL,NULL),(2,1,NULL,NULL,NULL,NULL,NULL,NULL),(3,1,NULL,NULL,NULL,NULL,NULL,NULL),(4,1,NULL,NULL,NULL,NULL,NULL,NULL),(5,1,NULL,NULL,NULL,NULL,NULL,NULL),(6,1,NULL,NULL,NULL,NULL,NULL,NULL),(7,1,NULL,NULL,NULL,NULL,NULL,NULL),(8,1,NULL,NULL,NULL,NULL,NULL,NULL),(9,1,NULL,NULL,NULL,NULL,NULL,NULL),(10,1,NULL,NULL,NULL,NULL,NULL,NULL),(11,1,NULL,NULL,NULL,NULL,NULL,NULL),(12,1,NULL,NULL,NULL,NULL,NULL,NULL),(13,1,NULL,NULL,NULL,NULL,NULL,NULL),(14,1,NULL,NULL,NULL,NULL,NULL,NULL),(15,1,NULL,NULL,NULL,NULL,NULL,NULL),(16,1,NULL,NULL,NULL,NULL,NULL,NULL),(17,1,NULL,NULL,NULL,NULL,NULL,NULL),(18,1,NULL,NULL,NULL,NULL,NULL,NULL),(19,1,NULL,NULL,NULL,NULL,NULL,NULL),(20,1,NULL,NULL,NULL,NULL,NULL,2),(21,1,NULL,NULL,2,NULL,NULL,NULL),(22,1,'2021-11-18','2021-11-30',NULL,'fati2',NULL,NULL),(23,1,'2021-11-18','2021-11-26',NULL,'fati2',NULL,NULL),(24,1,'2021-11-17','2021-11-23',NULL,'fati2',NULL,NULL),(25,1,'2021-11-18','2021-11-23',NULL,'fati2',NULL,NULL),(26,1,'2021-11-17','2021-11-17',NULL,'fati2',NULL,NULL),(27,1,'2021-11-26','2021-11-27',2,'fati2',NULL,NULL),(28,1,'2021-11-19','2021-11-20',2,'fati2',100,1),(29,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(30,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(31,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(32,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(33,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(34,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(35,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(36,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(37,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(38,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(39,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(40,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(41,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(42,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(43,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(44,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(45,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(46,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(47,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(48,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(49,1,'2021-11-25','2021-11-26',2,'fati2',100,1),(50,1,'2021-11-20','2021-11-28',1,'fati2',50,1),(51,1,'2021-11-25','2021-11-30',1,'fati2',50,1),(52,1,'2021-11-19','2021-11-20',1,'fati2',50,1),(53,1,'2021-11-28','2021-12-10',2,'fati2',100,1),(54,1,'2021-11-26','2021-11-28',2,'fati2',100,1),(55,1,'2021-11-20','2021-11-30',1,'fati2',50,1),(56,1,'2021-11-25','2021-11-30',1,'testendirecte',50,1),(57,1,'2021-11-21','2021-11-28',1,'fati2',50,1);
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `idtipo` int(15) NOT NULL AUTO_INCREMENT,
  `precio` int(10) DEFAULT NULL,
  `imagen` varchar(30) DEFAULT NULL,
  `m2` int(5) DEFAULT NULL,
  `cantidad` int(5) DEFAULT NULL,
  `persmax` int(5) DEFAULT NULL,
  `descripcion` varchar(420) DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `vacinicio` date DEFAULT NULL,
  `vacfin` date DEFAULT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` VALUES (1,50,'habitacio1.jpg',40,15,4,'Habitació estàndar econòmica','Individual estàndar','2021-02-17','2021-02-17'),(2,100,'habitacio2.jpg',60,22,4,'Dúplex ideal per parelles o per compartir amb els amics.','Doble estàndard','2021-02-17','2021-02-17'),(4,60,'habitacio3.jpg',60,10,3,'Ideal per turistes','Duplex premium',NULL,NULL);
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `usuari` varchar(69) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nombre` varchar(69) DEFAULT NULL,
  `apellidos` varchar(69) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `sexo` tinyint(1) DEFAULT NULL,
  `tipo` varchar(69) DEFAULT 'cliente',
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`usuari`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('adminmoha','$2y$10$fbYM.FLNAnlVK3Fhm4W5NuYMInEbiv8dUNGk21MBP4B7h5LaG1O1a','Moha','Admin','2001-02-10',NULL,'admin','sadfadfs@gmail.com'),('asdfasdfasdf','$2y$10$EY4BP8GsaDQA1p1MofKiw.b2QMExi4i/iWGCBe7uDSdTAa2NarvVe','moha','asfdasdf','2001-02-12',NULL,'cliente','mohamedbourarach@gmail.com'),('fati2','$2y$10$u76N3tHmRrUJkCOdW/dsIuHSFwG.W4OYKqXD9nbYEjt7J7/mcS8O2','fati','sdfa','2001-02-12',0,'cliente','a2sda@gmail.com'),('kirillfeo','$2y$10$ySDfri.aRsSKTxPGScNQFOF8oeyUOlMfreQBCtxLnBOUeFIEg2DWS','kirilfeo','loco','2001-02-17',NULL,'cliente','aasdfas@gmail.com'),('moha','$2y$10$ABRIUKBao/DxOkcvKFN.LeEEnop7OcOaPM1PlNk.hNao9RqsQN9bm','moha','bourarach','2001-07-16',0,'cliente','molamedb@gmail.com'),('moha2','$2y$10$QNRmUj46BwPo5UZ7jo6uJ.lBNrmtF4Y3spB.CeTA96tq2SHQeJDtS','Moha','damo','2001-12-12',NULL,'cliente','molamedb@gmail.com'),('moha50','$2y$10$tX.M0E84trafBEeUL6wNB./qREkDwx6hlTLbXQUYOEg645DDneC56','moha','bourarach','2001-07-17',NULL,'cliente','mohamedbourarach@gmail.com'),('nanita','$2y$10$yj9RiaY449HkwXwdNg8R6udW7YwAXG6JlMGAsxySmfy4W/cMWg8zS','Nanita','nana','2000-02-10',0,'cliente','nanita@gmail.com'),('Prova','$2y$10$4PbJDImVYmCP8ikQ02FjEuG/UW59LFdGE1QO9SHDIEeDFIcv4Tnfy','cendrassos','prova','1996-06-17',NULL,'cliente','cendrassos@cendrassos.net'),('sdfasdfasdfasd','$2y$10$LPZ1V.7OlRdBhPIKQwih0.YdsQexs/XCP22B7af/9vIewCbKdZ3tm','nihadfa','asdfasdf','1996-02-17',0,'cliente','asdfasdf@gmail.com'),('testendirecte','$2y$10$3SHlExRD./FyA3qQOWGdEefYAdx6nY3/PI7vvQDCWlJ8Hs5VaGwyy','asdfasdfasdf','asfafa','1995-02-17',0,'cliente','adsfasdfazi@gmail.com');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-21 11:54:24
```
S'han de afegir les seguents comandas
```sql
 ALTER TABLE tipo ALTER vacfin SET DEFAULT '2021-02-17';
ALTER TABLE tipo ALTER vacinicio SET DEFAULT '2021-02-17';
````
SEGON INSTAL·LEM ELS SEGUENTS MÒDULS DE PHP I DEL APACHE
=============
````
bcmath, calendar, Core, ctype, curl, date, dom, exif, FFI, fileinfo, filter, ftp, gd, gettext, hash, iconv, json, libxml, mbstring, mysqli, mysqlnd, openssl, pcntl, pcre, PDO, pdo_mysql, Phar, posix, readline, Reflection, session, shmop, SimpleXML, sockets, sodium, SPL, standard, sysvmsg, sysvsem, sysvshm, tokenizer, xml, xmlreader, xmlwriter, xsl, Zend OPcache, zip, zlib

Instalem el apache2

I executem el seguent script a la nostra pagina
````
--------------------------------------------------------------------------------------------------------------------------------------------------
````


if [ "$(whoami)" != 'root' ]; then
echo "Has de accedir com a root"
exit 1;
fi
read -p "Escriu el server name que vols (sense el www e.g mkhotels) : " servidor
read -p "Escriu el CNAME (e.g. www) : " cname
read -p "Escriu la ruta on vols instalar-ho (e.g. : /var/www/ ): " ruta
read -p "Escriu el usuari qye vols utilizar (e.g. : apache) : " usuari
read -p "Escriu la IP del teu servidor (e.g. : 192.168.56.2): " ip
if ! mkruta -p $ruta$cname_$servidor; then
echo "La ruta ja existeix !"
else
echo "La Web del directory  se ha creat !"
fi
echo "<?php echo '<h1>$cname $servidor</h1>'; ?>" > $ruta$cname_$servidor/index.php
chown -R $usuari:$usuari $ruta$cname_$servidor
chmod -R '755' $ruta$cname_$servidor
mkruta /var/log/$cname_$servidor

alias=$cname.$servidor
if [[ "${cname}" == "" ]]; then
alias=$servidor
fi

echo "#### $cname $servidor
<VirtualHost $ip:80>
ServerName $servidor
ServerAlias $alias
DocumentRoot $ruta$cname_$servidor
<rutaectory $ruta$cname_$servidor>
Options Indexes FollowSymLinks MultiViews
AllowOverride All
Order allow,deny
Allow from all
Require all granted
</rutaectory>
</VirtualHost>" > /etc/httpd/conf.d/$cname_$servidor.conf
if ! echo -e /etc/httpd/conf.d/$cname_$servidor.conf; then
echo "Virtual host no s'ha creat !"
else
echo "Virtual host se ha creat !"
fi
echo "Would you like me to create ssl virtual host [y/n]? "
read q
if [[ "${q}" == "yes" ]] || [[ "${q}" == "y" ]]; then
openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/httpd/conf.d/$cname_$servidor.key -out /etc/httpd/conf.d/$cname_$servidor.crt
if ! echo -e /etc/httpd/conf.d/$cname_$servidor.key; then
echo "Certificate key wasn't created !"
else
echo "Certificate key created !"
fi
if ! echo -e /etc/httpd/conf.d/$cname_$servidor.crt; then
echo "Certificat no creat !"
else
echo "Certificat creat !"
fi

echo "#### ssl $cname $servidor
<VirtualHost $ip:443>
SSLEngine on
SSLCertificateFile /etc/httpd/conf.d/$cname_$servidor.crt
SSLCertificateKeyFile /etc/httpd/conf.d/$cname_$servidor.key
ServerName $servidor
ServerAlias $alias
DocumentRoot $ruta$cname_$servidor
<rutaectory $ruta$cname_$servidor>
Options Indexes FollowSymLinks MultiViews
AllowOverride All
Order allow,deny
Allow from all
Satisfy Any
</rutaectory>
</VirtualHost>" > /etc/httpd/conf.d/ssl.$cname_$servidor.conf
if ! echo -e /etc/httpd/conf.d/ssl.$cname_$servidor.conf; then
echo "SSL Virtual host no ha sigut creada !"
else
echo "SSL Virtual host se ha creat !"
fi
fi

echo "127.0.0.1 $servidor" >> /etc/hosts
if [ "$alias" != "$servidor" ]; then
echo "127.0.0.1 $alias" >> /etc/hosts
fi
echo "Testing configuration"
service httpd configtest
echo "Vols reinciar el servidor [y/n]? "
read q
if [[ "${q}" == "yes" ]] || [[ "${q}" == "y" ]]; then
service httpd restart
fi

````
