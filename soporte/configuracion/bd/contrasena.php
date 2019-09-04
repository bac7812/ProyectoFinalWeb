<?php
	// conexión a la base de datos
	require('../conf/conexion.php');
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id						= $_SESSION['id'];
		$antiguaContrasena   	= htmlentities(addslashes($_POST['antiguaContrasena']));
		$nuevaContrasena		= htmlentities(addslashes($_POST['nuevaContrasena']));
		$repitaContrasena		= htmlentities(addslashes($_POST['repitaContrasena']));
		$contrasena = md5($antiguaContrasena);
		// declaramos la consulta
		$sql = "SELECT * FROM usuarios WHERE id=:id AND contrasena=:contrasena";
		// preparamos la consulta
		$resultado = $conn->prepare($sql);
		// pasamos valores a la consulta mediante parametros
		$resultado->bindParam(':id', $id);
		$resultado->bindValue(':contrasena', $contrasena);
		// ejecutamos la consulta
		$resultado->execute();
		$registro = $resultado->rowCount();
		// comprobamos la consulta
		if ($registro != 0) {
			if ($nuevaContrasena==$repitaContrasena){
				$contrasena = md5($nuevaContrasena);
				// declaramos la actualización
				$sql = "UPDATE usuarios SET contrasena=:contrasena WHERE id=:id";
				// preparamos la actualización
				$resultado = $conn->prepare($sql);
				// pasamos valores a la actualización mediante parametros
				$resultado->bindParam(':id', $id);
				$resultado->bindParam(':contrasena', $contrasena);
				// ejecutamos la actualización
				$resultado->execute();
				$_SESSION['aviso'] = '<p class="correcto">Tu contraseña se ha modificado correctamente.</p>';
			}else{
				$_SESSION['aviso'] = '<p class="error">Los campos de nueva contraseña no coinciden. No se realizaron cambios en tu cuenta.</p>';
			}
		}else{
			$_SESSION['aviso'] = '<p class="error">Tu contraseña no es válida. No se realizaron cambios en tu cuenta.</p>';
		}
	}
	
	// cierra la conexión con la base de datos	
	$conn = null;
?>