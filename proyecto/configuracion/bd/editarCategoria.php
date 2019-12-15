<?php
	// conexión a la base de datos
	require('../conf/conexion.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id				= htmlentities(addslashes($_GET['id']));
		$categoria  	= htmlentities(addslashes($_POST['categoria']));
		$estado			= htmlentities(addslashes($_POST['estado']));
		// declaramos la actualización
		$sql = "UPDATE categorias SET categoria=:categoria, estado=:estado WHERE id=:id";
		// preparamos la actualización
		$resultado = $conn->prepare($sql);
		// pasamos valores a la actualización mediante parametros
		$resultado->bindParam(':id', $id);
		$resultado->bindParam(':categoria', $categoria);
		$resultado->bindParam(':estado', $estado);
		// ejecutamos la actualización
		$resultado->execute();
		$_SESSION['aviso'] = '<p class="correcto">Ya modificado categoria.</p>';
		header('location: /proyecto/configuracion/index.php?opcion=categorias');
	} else {
		$id	= htmlentities(addslashes($_GET['id']));
		// declaramos la consulta
		$sql = "SELECT * FROM categorias WHERE id=:id";
		// preparamos la consulta
		$resultado = $conn->prepare($sql);
		// pasamos valores a la consulta mediante parametros
		$resultado->bindValue(':id', $id);
		// ejecutamos la consulta
		$resultado->execute();
		$registro = $resultado->fetch();
		// comprobamos la consulta
		if ($registro) {
			$categoria	= $registro['categoria'];
			$estado		= $registro['estado'];
		}
	}
	
	// cierra la conexión con la base de datos	
	$conn = null;
?>