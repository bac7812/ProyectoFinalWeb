<?php
	// conexión a la base de datos
	require('../conf/conexion.php');

	$mensaje = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$id						= htmlentities(addslashes($_GET['id']));
		$nuevaContrasena		= htmlentities(addslashes($_POST['nuevaContrasena']));
		$repitaContrasena		= htmlentities(addslashes($_POST['repitaContrasena']));
		if($nuevaContrasena == $repitaContrasena){
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
			header('location: /proyecto/acceso');
		} else {
			$_SESSION['aviso'] = '<p class="error">Los campos de nueva contraseña no coinciden. No se realizaron cambios en tu cuenta.</p>';
		}
	}
	
	// cierra la conexión con la base de datos	
	$conn = null;
?>