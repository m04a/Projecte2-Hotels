<?php
    $servername='localhost';
    $username='kirll';
    $password='Nemes1sx';
    $dbname = "hotel";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
		else{ console.log('Hola');}
?>