<?php
	// conexión a la base de datos
	require('../conf/conexion.php');
	
	// comprobar solicitud
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// comprobar seguimiento para añadir
		if($_POST['seguimiento'] == "añadir") {
			if($_POST['descripcion_seguimiento'] != ""){
				// declaramos la consulta
				$sql = "SELECT * FROM incidencias WHERE id=:id";
				// preparamos la consulta
				$resultado = $conn->prepare($sql);
				// pasamos valores a la consulta mediante parametros
				$resultado->bindValue(':id', $id);
				// ejecutamos la consulta
				$resultado->execute();
				$registro = $resultado->fetch();
				// comprobamos la consulta
				if ($registro) {
					$incidencia = htmlentities(addslashes($_GET['id']));
					$descripcion 	= htmlspecialchars(addslashes($_POST['descripcion_seguimiento']));
					$usuario 		= $_SESSION['id'];
					// declaramos la consulta
					$sql = "INSERT INTO seguimientos (incidencia, fecha, descripcion, usuario) VALUES (:incidencia, now(), :descripcion, :usuario)";
					// preparamos la consulta
					$resultado = $conn->prepare($sql);
					// pasamos valores a la consulta mediante parametros
					$resultado->bindParam(':incidencia', $incidencia);
					$resultado->bindParam(':descripcion', $descripcion);
					$resultado->bindParam(':usuario', $usuario);
					// ejecutamos la consulta
					if($resultado->execute()){
						$_SESSION['aviso'] = '<p class="correcto">Ya añadido seguimiento.</p>';
					}
				}
			} else {
				$_SESSION['aviso'] = '<p class="error">El campo de descripción del seguimiento esta vacio. Introduzca un valor.</p>';
			}
		} else {
			// comprobar seguimiento para eliminar
			if($_POST['seguimiento'] == "eliminar") {
				$id = htmlspecialchars(addslashes($_POST['id']));
				$usuario = $_SESSION['id'];
				// declaramos la consulta
				$sql = "DELETE FROM seguimientos WHERE id=:id and usuario=:usuario";
				// preparamos la consulta
				$resultado = $conn->prepare($sql);
				// pasamos valores a la consulta mediante parametros
				$resultado->bindParam(':id', $id);
				$resultado->bindParam(':usuario', $usuario);
				// ejecutamos la consulta
				if($resultado->execute()){
					$_SESSION['aviso'] = '<p class="correcto">Ya eliminado seguimiento.</p>';
				}
			}
		}
	} else{

		$id	= htmlentities(addslashes($_GET['id']));
		// declaramos la consulta
		$sql = "SELECT *, CONCAT(s.nombre,' ', s.apellidos) AS solicitante, t.tipo, c.categoria, p.prioridad, e.estado, CONCAT(a.nombre,' ', a.apellidos) AS asignada, v.validacion FROM incidencias AS i
				JOIN usuarios AS s ON i.solicitante = s.id
				JOIN tipos AS t ON i.tipo = t.id
				JOIN categorias AS c ON i.categoria = c.id
				JOIN prioridades AS p ON i.prioridad = p.id
				JOIN estados AS e ON i.estado = e.id
				LEFT JOIN usuarios AS a ON i.asignada = a.id
				JOIN validaciones AS v ON i.validacion = v.id
				WHERE i.id=:id";
		// preparamos la consulta
		$resultado = $conn->prepare($sql);
		// pasamos valores a la consulta mediante parametros
		$resultado->bindValue(':id', $id);
		// ejecutamos la consulta
		$resultado->execute();
		$registro = $resultado->fetch();
		// comprobamos la consulta
		if ($registro) {
			$fecha_apertura 	= $registro['fecha_apertura'];
			$fecha_modificacion = $registro['fecha_modificacion'];
			$fecha_cerrada		= $registro['fecha_cerrada'];
			$solicitante		= $registro['solicitante'];
			$tipo				= $registro['tipo'];
			$categoria 			= $registro['categoria'];
			$prioridad 			= $registro['prioridad'];
			$estado 			= $registro['estado'];
			$asignada 			= $registro['asignada'];
			$validacion			= $registro['validacion'];
			$titulo 			= $registro['titulo'];
			$descripcion 		= $registro['descripcion'];
			$adjunto			= $registro['adjunto'];
		}
		// seguimientos
		// declaramos la consulta
		$sqlseguimientos = "SELECT *, CONCAT(u.nombre,' ', u.apellidos) AS usuario, u.id, s.id AS idSeguimiento FROM seguimientos AS s
							JOIN usuarios AS u ON s.usuario = u.id
							WHERE incidencia = :incidencia
							ORDER BY id";
		// preparamos la consulta
		$resultadoseguimientos = $conn->prepare($sqlseguimientos);
		// pasamos valores a la consulta mediante parametros
		$resultadoseguimientos->bindValue(':incidencia', $id);
		// ejecutamos la consulta
		$resultadoseguimientos->execute();
	}
	
	// cierra la conexión con la base de datos	
	$conn = null;
?>