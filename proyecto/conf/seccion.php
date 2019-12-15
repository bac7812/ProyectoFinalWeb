<?php
	
	$web = "Portal de Soporte";
	$error = "Página no encontrada";
	
	$seccion = basename(parse_url(getcwd(), PHP_URL_PATH));
	// declaramos la consulta
	$sql = "SELECT * FROM secciones WHERE seccion=:seccion";
	// preparamos la consulta
	$resultado = $conn->prepare($sql);
	// pasamos valores a la consulta mediante parametros
	$resultado->bindValue(':seccion', $seccion);
	// ejecutamos la consulta
	$resultado->execute();
	$registro = $resultado->fetch();
	// comprobamos la consulta
	if ($registro) {
		$id = $registro['id'];
		
		if(isset($_GET['opcion'])){
			// declaramos la consulta
			$sql = "SELECT * FROM opciones WHERE id=:id and opcion=:opcion";
			// preparamos la consulta
			$resultado = $conn->prepare($sql);
			// pasamos valores a la consulta mediante parametros
			$resultado->bindValue(':id', $id);
			$resultado->bindValue(':opcion', $_GET['opcion']);
			// ejecutamos la consulta
			$resultado->execute();
			$registro = $resultado->fetch();
			// comprobamos la consulta
			if ($registro) {
				$titulo_principal = $registro['titulo'];
				$contenido = $registro['opcion'];
			}
		} else {
			// declaramos la consulta
			$sql = "SELECT * FROM opciones WHERE id=:id and menu=1";
			// preparamos la consulta
			$resultado = $conn->prepare($sql);
			// pasamos valores a la consulta mediante parametros
			$resultado->bindValue(':id', $id);
			// ejecutamos la consulta
			$resultado->execute();
			$registro = $resultado->fetch();
			// comprobamos la consulta
			if ($registro) {
				$titulo_principal = $registro['titulo'];
				$contenido = $registro['opcion'];
			} 
		}
	}
	
	// cierra la conexión con la base de datos	
	$conn = null;
?>