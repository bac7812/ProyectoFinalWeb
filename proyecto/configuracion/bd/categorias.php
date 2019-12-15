<?php
	// conexión a la base de datos
	require('../conf/conexion.php');
	
	// declaramos la consulta
	$sql = "SELECT * FROM categorias";
	// preparamos la consulta
	$resultado = $conn->prepare($sql);
	// ejecutamos la consulta
	$resultado->execute();
	
	// cierra la conexión con la base de datos	
	$conn = null;
?>