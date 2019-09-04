<?php
	$servidor 	= "localhost";
	$nombredb 	= "soporte";
	$usuario 	= "root";
	$contrasena = "abc123.";
	
	$conn = new PDO("mysql:host=$servidor; dbname=$nombredb; charset=utf8", $usuario, $contrasena);
?>