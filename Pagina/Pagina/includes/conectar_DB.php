<?php
    $servername='localhost';
    $username='kirill';
    $password='Nemes1sx';
    $dbname = "hotel";
	
	try{
    $conn= new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
   }
   catch(PDOexception $e){die('Could not Connect MySql Server:' .$e->getMessage());}
?>