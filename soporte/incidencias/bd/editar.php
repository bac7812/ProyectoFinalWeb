<?php
	// conexión a la base de datos
	require('../conf/conexion.php');
	
	// comprobar solicitud
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// comprobar seguimiento para añadir
		if($_POST['seguimiento'] == "añadir"){
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
			if($_POST['seguimiento'] == "eliminar"){
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
			} else {
				$id	= htmlentities(addslashes($_GET['id']));
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
					$fecha_cerrada		= htmlspecialchars(addslashes($_POST['fecha_cerrada']));
					$asignada  			= htmlspecialchars(addslashes($_POST['asignada']));
					$tipo	  			= htmlspecialchars(addslashes($_POST['tipo']));
					$categoria			= htmlspecialchars(addslashes($_POST['categoria']));
					$prioridad			= htmlspecialchars(addslashes($_POST['prioridad']));
					$estado				= htmlspecialchars(addslashes($_POST['estado']));
					$validacion			= htmlspecialchars(addslashes($_POST['validacion']));
					$titulo				= htmlspecialchars(addslashes($_POST['titulo']));
					$descripcion		= htmlspecialchars(addslashes($_POST['descripcion']));
					// declaramos la consulta
					if($fecha_cerrada == 1){
						$sql = "UPDATE incidencias SET fecha_modificacion=now(), fecha_cerrada=:now(), asignada=:asignada, tipo=:tipo, categoria=:categoria, prioridad=:prioridad, estado=:estado, validacion=:validacion, titulo=:titulo, descripcion=:descripcion WHERE id=:id";
					} else {
						$sql = "UPDATE incidencias SET fecha_modificacion=now(), fecha_cerrada=:now(), asignada=:asignada, tipo=:tipo, categoria=:categoria, prioridad=:prioridad, estado=:estado, validacion=:validacion, titulo=:titulo, descripcion=:descripcion WHERE id=:id";
					}
					// preparamos la consulta
					$resultado = $conn->prepare($sql);
					// pasamos valores a la consulta mediante parametros
					$resultado->bindParam(':id', $id);
					$resultado->bindParam(':asignada', $asignada);
					$resultado->bindParam(':tipo', $tipo);
					$resultado->bindParam(':categoria', $categoria);
					$resultado->bindParam(':prioridad', $prioridad);
					$resultado->bindParam(':estado', $estado);
					$resultado->bindParam(':validacion', $validacion);
					$resultado->bindParam(':titulo', $titulo);
					$resultado->bindParam(':descripcion', $descripcion);
					// ejecutamos la consulta
					if($resultado->execute()){
						$_SESSION['aviso'] = '<p class="correcto">Ya modificado incidencia.</p>';
						header('location: /proyecto/incidencias');
					}
				}
			}
		}
	} else{
		$id	= htmlentities(addslashes($_GET['id']));
		// declaramos la consulta
		$sql = "SELECT *, CONCAT(s.nombre,' ', s.apellidos) AS solicitante, a.id AS asignada, i.estado AS estado FROM incidencias AS i
				JOIN usuarios AS s ON i.solicitante = s.id
				LEFT JOIN usuarios AS a ON i.asignada = a.id
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
		echo $estado;
		// tipos
		// declaramos la consulta
		$sqltipo = "SELECT * FROM tipos WHERE estado=1";
		// preparamos la consulta
		$resultadotipos = $conn->prepare($sqltipo);
		// ejecutamos la consulta
		$resultadotipos->execute();
		
		// categorias
		// declaramos la consulta
		$sqlcategorias = "SELECT * FROM categorias WHERE estado=1";
		// preparamos la consulta
		$resultadocategorias = $conn->prepare($sqlcategorias);
		// ejecutamos la consulta
		$resultadocategorias->execute();
		
		// prioridades
		// declaramos la consulta
		$sqlprioridades = "SELECT * FROM prioridades";
		// preparamos la consulta
		$resultadoprioridades = $conn->prepare($sqlprioridades);
		// ejecutamos la consulta
		$resultadoprioridades->execute();
		
		// estados
		// declaramos la consulta
		$sqlestados = "SELECT * FROM estados";
		// preparamos la consulta
		$resultadoestados = $conn->prepare($sqlestados);
		// ejecutamos la consulta
		$resultadoestados->execute();
		
		// asignadas
		// declaramos la consulta
		$sqlasignadas = "SELECT CONCAT(u.nombre,' ', u.apellidos) AS asignada, u.id FROM asignadas AS a
						 JOIN usuarios AS u ON a.id = u.id
						 WHERE a.asignada = 1";
		// preparamos la consulta
		$resultadoasignadas = $conn->prepare($sqlasignadas);
		// ejecutamos la consulta
		$resultadoasignadas->execute();
		
		// validaciones
		// declaramos la consulta
		$sqlvalidaciones = "SELECT * FROM validaciones";
		// preparamos la consulta
		$resultadovalidaciones = $conn->prepare($sqlvalidaciones);
		// ejecutamos la consulta
		$resultadovalidaciones->execute();
		
		// seguimientos
		// declaramos la consulta
		$sqlseguimientos = "SELECT *, CONCAT(u.nombre,' ', u.apellidos) AS usuario, u.id, s.id AS idSeguimiento FROM seguimientos AS s
							JOIN usuarios AS u ON s.usuario = u.id
							WHERE incidencia = :incidencia";
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