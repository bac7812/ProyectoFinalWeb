<?php
	// conexión a la base de datos
	require('../conf/conexion.php');
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id					= $_SESSION['id'];
		$nombre				= htmlentities(addslashes($_POST['nombre']));
		$apellidos			= htmlentities(addslashes($_POST['apellidos']));
		$correoelectronico	= htmlentities(addslashes($_POST['correoelectronico']));
		// declaramos la actualización
		$sql = "UPDATE usuarios SET nombre=:nombre, apellidos=:apellidos, correoelectronico=:correoelectronico WHERE id=:id";
		// preparamos la actualización
		$resultado = $conn->prepare($sql);
		// pasamos valores a la actualización mediante parametros
		$resultado->bindParam(':id', $id);
		$resultado->bindParam(':nombre', $nombre);
		$resultado->bindParam(':apellidos', $apellidos);
		$resultado->bindParam(':correoelectronico', $correoelectronico);
		// ejecutamos la actualización
		$resultado->execute();
		$_SESSION['aviso'] = '<p class="correcto">Tu perfil se ha modificado con éxito.</p>'.$usuario;
	} else {
		$id	= $_SESSION['id'];		
		// declaramos la consulta
		$sql = "SELECT * FROM usuarios WHERE id=:id";
		// preparamos la consulta
		$resultado = $conn->prepare($sql);
		// pasamos valores a la consulta mediante parametros
		$resultado->bindValue(':id', $id);
		// ejecutamos la consulta
		$resultado->execute();
		$registro = $resultado->fetch();
		// comprobamos la consulta
		if ($registro) {
			$usuario 			= $registro['usuario'];
			$nombre 			= $registro['nombre'];
			$apellidos 			= $registro['apellidos'];
			$correoelectronico	= $registro['correoelectronico'];
		}
	}
	
	// cierra la conexión con la base de datos	
	$conn = null;
?>