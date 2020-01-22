<?php
	// conexión a la base de datos
	require('../conf/conexion.php');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id					= htmlentities(addslashes($_GET['id']));
		$usuario		   	= htmlentities(addslashes($_POST['usuario']));
		$nombre				= htmlentities(addslashes($_POST['nombre']));
		$apellidos			= htmlentities(addslashes($_POST['apellidos']));
		$correoelectronico	= htmlentities(addslashes($_POST['correoelectronico']));
		$estado				= htmlentities(addslashes($_POST['estado']));
		$contraseña			= htmlentities(addslashes($_POST['contrasena']));
		$contrasena = md5($contrasena);
		// declaramos la actualización
		$sql = "UPDATE usuarios SET usuario=:usuario, nombre=:nombre, apellidos=:apellidos, correoelectronico=:correoelectronico, estado=:estado, contrasena=:contrasena WHERE id=:id";
		// preparamos la actualización
		$resultado = $conn->prepare($sql);
		// pasamos valores a la actualización mediante parametros
		$resultado->bindParam(':id', $id);
		$resultado->bindParam(':usuario', $usuario);
		$resultado->bindParam(':nombre', $nombre);
		$resultado->bindParam(':apellidos', $apellidos);
		$resultado->bindParam(':correoelectronico', $correoelectronico);
		$resultado->bindParam(':estado', $estado);
		$resultado->bindParam(':contrasena', $contrasena);
		// ejecutamos la actualización
		if($resultado->execute()){
			$verValor = 0;
			$editarValor = 0;
			$eliminarValor = 0;
			$configurarValor = 0;
			foreach($_POST['permisos'] as $valor)
			{
				if($valor == 'ver') { $verValor = 1; }
				if($valor == 'editar') { $editarValor = 1; }
				if($valor == 'eliminar') { $eliminarValor = 1; }
				if($valor == 'configurar') { $configurarValor = 1; }
			}
			// declaramos la consulta
			$sql = "UPDATE permisos SET ver=:ver, editar=:editar, eliminar=:eliminar, configurar=:configurar WHERE id=:id";
			// preparamos la consulta
			$resultado = $conn->prepare($sql);
			// pasamos valores a la consulta mediante parametros
			$resultado->bindParam(':id', $id);
			$resultado->bindParam(':ver', $verValor);
			$resultado->bindParam(':editar', $editarValor);
			$resultado->bindParam(':eliminar', $eliminarValor);
			$resultado->bindParam(':configurar', $configurarValor);
			// comprobamos la consulta
			if ($resultado->execute()) {
				
				$_SESSION['aviso'] = '<p class="correcto">Ya modificado usuario.</p>';
				header('location: /proyecto/configuracion/index.php?opcion=usuarios');
			}
		}
	} else {
		$id	= htmlentities(addslashes($_GET['id']));
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
			$estado				= $registro['estado'];
			//declaramos la consulta
			$sql = "SELECT * FROM permisos WHERE id=:id";
			//preparamos la consulta
			$resultadopermisos = $conn->prepare($sql);
			//pasamos valores a la consulta mediante parametros
			$resultadopermisos->bindValue(':id', $id);
			//ejecutamos la consulta
			$resultadopermisos->execute();
			$registropermisos = $resultadopermisos->fetch();
		}
	}
	
	// cierra la conexión con la base de datos	
	$conn = null;
?>