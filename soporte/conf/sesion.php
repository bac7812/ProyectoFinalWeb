<?php
	// se inicia la sesion
	session_start();
	// si no existe esa sesión de usuario o no es el mismo de la sesion anterior, introducimos sus datos
	if ((!isset($_SESSION['acceso'])) || ($_SESSION['acceso'] != true)) {
		header('Location: /proyecto/acceso');
		
	} else {
		// actualizar tiempo
		$now = time();
		
		// comprobar esa sesión está expirar
		if($now > $_SESSION['expira']){
			session_destroy();
			header('Location: /proyecto/acceso/');
			exit();
		}
	};
?>