<?php
	// conexión a la base de datos
	include('../conf/conexion.php');
	
	// comprobar solicitud
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$usuario	= htmlentities(addslashes($_POST['usuario']));
		// declaramos la consulta
		$sql = "SELECT * FROM usuarios WHERE usuario=:usuario";
		// preparamos la consulta
		$resultado = $conn->prepare($sql);
		// pasamos valores a la consulta mediante parametros
		$resultado->bindValue(':usuario', $usuario);
		// ejecutamos la consulta
		$resultado->execute();
		$registro = $resultado->fetch();
		if(!$registro){
			$usuario 			= htmlentities(addslashes($_POST['usuario']));
			$contrasena			= htmlentities(addslashes($_POST['contrasena']));
			$nombre				= htmlentities(addslashes($_POST['nombre']));
			$apellidos			= htmlentities(addslashes($_POST['apellidos']));
			$correoelectronico	= htmlentities(addslashes($_POST['correoelectronico']));
			$estado				= htmlentities(addslashes($_POST['estado']));
			$contrasena = md5($contrasena);
			// declaramos la consulta
			$sql = "INSERT INTO usuarios (usuario, contrasena, nombre, apellidos, correoelectronico, estado) VALUES (:usuario, :contrasena, :nombre, :apellidos, :correoelectronico, :estado)";
			// preparamos la consulta
			$resultado = $conn->prepare($sql);
			// pasamos valores a la consulta mediante parametros
			$resultado->bindParam(':usuario', $usuario);
			$resultado->bindParam(':contrasena', $contrasena);
			$resultado->bindParam(':nombre', $nombre);
			$resultado->bindParam(':apellidos', $apellidos);
			$resultado->bindParam(':correoelectronico', $correoelectronico);
			$resultado->bindParam(':estado', $estado);
			// ejecutamos la consulta
			if($resultado->execute()){
				// declaramos la consulta
				$sql = "SELECT * FROM usuarios WHERE usuario=:usuario";
				// preparamos la consulta
				$resultado = $conn->prepare($sql);
				// pasamos valores a la consulta mediante parametros
				$resultado->bindValue(':usuario', $usuario);
				// ejecutamos la consulta
				$resultado->execute();
				$registro = $resultado->fetch();
				// comprobamos la consulta
				if ($registro) {
					$id = $registro['id'];
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
					$sql = "INSERT INTO permisos (id, ver, editar, eliminar, configurar) VALUES (:id, :ver, :editar, :eliminar, :configurar)";
					// preparamos la consulta
					$resultado = $conn->prepare($sql);
					// pasamos valores a la consulta mediante parametros
					$resultado->bindParam(':id', $id);
					$resultado->bindParam(':ver', $verValor);
					$resultado->bindParam(':editar', $editarValor);
					$resultado->bindParam(':eliminar', $eliminarValor);
					$resultado->bindParam(':configurar', $configurarValor);
					// ejecutamos la consulta
					$resultado->execute();
					// comprobamos la consulta
					if ($registro) {
						$_SESSION['aviso'] = '<p class="correcto">Ya añadido usuario.</p>';
						header ("location: /proyecto/configuracion?opcion=usuarios");
					}
				}
			}
		} else {
			$_SESSION['avisoerror'] = '<p class="error">El usuario ya existe.</p>';
			header ("location: /proyecto/configuracion?opcion=insertarUsuario");
		}
	}
	
	// cierra la conexión con la base de datos	
	$conn = null;
?>