<?php
	// conexión a la base de datos
	require('../conf/conexion.php');

	// declarar identidad
	$id = $_SESSION['id'];
	if($configurar == 1){
		// declaramos la consulta
		$sql = "SELECT i.id, i.fecha_apertura, i.titulo, CONCAT(s.nombre,' ', s.apellidos) AS solicitante, CONCAT(a.nombre,' ', a.apellidos) AS asignada, t.tipo, c.categoria, p.prioridad, e.estado, v.validacion FROM incidencias AS i
			JOIN usuarios AS s ON i.solicitante = s.id
			LEFT JOIN usuarios AS a ON i.asignada = a.id
			JOIN tipos AS t ON i.tipo = t.id
			JOIN categorias AS c ON i.categoria = c.id
			JOIN prioridades AS p ON i.prioridad = p.id
			JOIN estados AS e ON i.estado = e.id
			JOIN validaciones AS v ON i.validacion = v.id
			ORDER BY id";
		// preparamos la consulta
		$resultado = $conn->prepare($sql);
		// ejecutamos la consulta
		$resultado->execute();
	} else {
		if($ver == 1 and $editar == 1){
		// declaramos la consulta
		$sql = "SELECT i.id, i.fecha_apertura, i.titulo, CONCAT(s.nombre,' ', s.apellidos) AS solicitante, CONCAT(a.nombre,' ', a.apellidos) AS asignada, t.tipo, c.categoria, p.prioridad, e.estado, v.validacion FROM incidencias AS i
			JOIN usuarios AS s ON i.solicitante = s.id
			LEFT JOIN usuarios AS a ON i.asignada = a.id
			JOIN tipos AS t ON i.tipo = t.id
			JOIN categorias AS c ON i.categoria = c.id
			JOIN prioridades AS p ON i.prioridad = p.id
			JOIN estados AS e ON i.estado = e.id
			JOIN validaciones AS v ON i.validacion = v.id
			WHERE i.asignada=:asignada
			ORDER BY id";
			// preparamos la consulta
			$resultado = $conn->prepare($sql);
			// pasamos valores a la consulta mediante parametros
			//$resultado->bindValue(':id', $id);
			$resultado->bindValue(':asignada', $id);
			// ejecutamos la consulta
			$resultado->execute();
		} else {
			// declaramos la consulta
			$sql = "SELECT i.id, i.fecha_apertura, i.titulo, CONCAT(s.nombre,' ', s.apellidos) AS solicitante, CONCAT(a.nombre,' ', a.apellidos) AS asignada, t.tipo, c.categoria, p.prioridad, e.estado, v.validacion FROM incidencias AS i
				JOIN usuarios AS s ON i.solicitante = s.id
				LEFT JOIN usuarios AS a ON i.asignada = a.id
				JOIN tipos AS t ON i.tipo = t.id
				JOIN categorias AS c ON i.categoria = c.id
				JOIN prioridades AS p ON i.prioridad = p.id
				JOIN estados AS e ON i.estado = e.id
				JOIN validaciones AS v ON i.validacion = v.id
				WHERE i.solicitante=:id
				ORDER BY id";
			// preparamos la consulta
			$resultado = $conn->prepare($sql);
			// pasamos valores a la consulta mediante parametros
			$resultado->bindValue(':id', $id);
			// ejecutamos la consulta
			$resultado->execute();
		}
	}
	
	// cierra la conexión con la base de datos	
	$conn = null;
?>