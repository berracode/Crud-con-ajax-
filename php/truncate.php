<?php 
$bd = new PDO('mysql:host=localhost;dbname=crud','root','');

$bd->query("TRUNCATE tblproductos");

header("location:../index.php"); 
?> 