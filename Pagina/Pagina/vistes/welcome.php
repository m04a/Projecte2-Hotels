<?php
    session_start();
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
   	<?php
if($_SESSION["usuari"]) {
?>
Welcome <?php echo $_SESSION["usuari"]; ?>. Click here to <a href="../includes/logout.php" tite="Logout">Logout.
<?php
}else echo "<h1>Please login first .</h1>";
?>
   </body>
   
</html>