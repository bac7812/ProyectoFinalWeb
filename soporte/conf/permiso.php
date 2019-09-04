<?php
	
	if(isset($_SESSION['id'])){
		// declarar identidad
		$id = $_SESSION['id'];
		// declaramos la consulta
		$sql = "SELECT * FROM permisos WHERE id=:id";
		// preparamos la consulta
		$resultado = $conn->prepare($sql);
		// pasamos valores a la consulta mediante parametros
		$resultado->bindValue(':id', $id);
		// ejecutamos la consulta
		$resultado->execute();
		$registro = $resultado->fetch();
		// comprobamos la consulta
		if ($registro) {
			$ver = $registro['ver'];
			$editar = $registro['editar'];
			$eliminar = $registro['editar'];
			$configurar = $registro['configurar'];
		}
	}
	
	// cierra la conexión con la base de datos	
	$conn = null;
?>