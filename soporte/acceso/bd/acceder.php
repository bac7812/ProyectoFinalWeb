<?php
	// conexión a la base de datos
	require('../conf/conexion.php');
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$usuario    = htmlentities(addslashes($_POST['usuario']));
		$contrasena = htmlentities(addslashes($_POST['contrasena']));
		$contrasena = md5($contrasena);
		// declaramos la consulta
		$sql = "SELECT * FROM usuarios WHERE usuario=:usuario AND contrasena=:contrasena";
		// preparamos la consulta
		$resultado = $conn->prepare($sql);
		// pasamos valores a la consulta mediante parametros
		$resultado->bindValue(':usuario', $usuario);
		$resultado->bindValue(':contrasena', $contrasena);
		// ejecutamos la consulta
		$resultado->execute();
		$registro = $resultado->fetch();
		// comprobamos la consulta
		if ($registro) {
			if($registro['estado'] == 1){
				$_SESSION['acceso'] = true;
				$_SESSION['tiempo'] = time();
				$_SESSION['expira'] = $_SESSION['tiempo'] + (20 * 60);
				$_SESSION['id'] = $registro['id'];
				header('location: /proyecto');
			} else {
				$_SESSION['aviso'] = '<p class="error">Tu cuenta está bloqueada.</p>';
			}
		}
		else {
			$_SESSION['aviso'] = '<p class="error">El nombre de usuario y la contraseña que ingresaste no coinciden con nuestros registros. Por favor, revisa e inténtalo de nuevo.</p>';
		}
	}
	
	// cierra la conexión con la base de datos	
	$conn = null;
?>